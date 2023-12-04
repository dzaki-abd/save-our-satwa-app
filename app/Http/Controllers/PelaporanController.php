<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Satwa;
use App\Models\Pelaporan;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePelaporanRequest;
use App\Http\Requests\UpdatePelaporanRequest;
use Carbon\Carbon;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Pelaporan::all();
        $countLaporan = [
            'ditinjau' => $laporan->where('status', 'Ditinjau')->count(),
            'disetujui' => $laporan->where('status', 'Disetujui')->count(),
            'ditolak' => $laporan->where('status', 'Ditolak')->count(),
        ];

        return view('dashboard.laporan.index', compact('countLaporan'));
    }

    public function getDataLaporan($filter) {
        setlocale(LC_TIME, 'id_ID');
        $laporan = Pelaporan::where('status', $filter)->get();

        return DataTables::of($laporan)
            ->addIndexColumn()
            ->addColumn('Uniq ID', function ($row) {
                return $row->uniqid;
            })
            ->addColumn('nama_pelapor', function ($row) {
                $user = User::find($row->user_id);
                return $user->name;
            })
            ->addColumn('tanggal_kejadian', function ($row) {
                return Carbon::parse($row->waktu_kejadian)->translatedFormat('d F Y');
            })
            ->addColumn('jenis_pelanggaran', function ($row) {
                $pelanggaran = Pelanggaran::find($row->pelanggaran_id);
                return $pelanggaran->nama_pelanggaran;
            })
            ->addColumn('jenis_satwa', function ($row) {
                $satwa = Satwa::find($row->satwa_id);
                return $satwa->nama_lokal;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'Ditolak') {
                    $badgeStatus = '<span class="badge text-bg-danger text-white">' . $row->status . '</span>';
                } elseif ($row->status == 'Ditinjau') {
                    $badgeStatus = '<span class="badge text-bg-warning text-white">' . $row->status . '</span>';
                } else {
                    $badgeStatus = '<span class="badge text-bg-success text-white">' . $row->status . '</span>';
                }
                return $badgeStatus;
            })
            ->addColumn('action', function ($row) {
                $encId = encrypt($row->id);
                $show = route('dashboard.laporan.show', $encId);
                $actionBtn = '
                    <div class="btn-group" id="group-edit-' . $row->id . '" role="group" aria-label="Action">
                        <a type="button" class="btn btn-primary btn-sm btn-icon" title="Ubah" href="' . $show . '"><i class="fa-solid fa-eye"></i></a>
                        <button type="button" class="btn btn-danger btn-sm btn-icon btn-delete" title="Hapus" data-id="' . $encId . '" data-uniq="' . $row->uniqid . '"><i class="fa-solid fa-trash"></i></button>
                    </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelaporanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelaporan $pelaporan, $laporan)
    {
        $idLaporan = decrypt($laporan);
        $laporan = Pelaporan::find($idLaporan);
        $user = User::find($laporan->user_id);
        $buktiKejadian = $laporan->buktiKejadian;

        $data = [
            'laporan' => $laporan,
            'user' => $user,
            'buktiKejadian' => $buktiKejadian,
        ];

        // return $buktiKejadian;

        return view('dashboard.laporan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelaporan $pelaporan)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $laporan)
    {
        $idLaporan = decrypt($laporan);

        $laporan = Pelaporan::where('id', $idLaporan)->first();
        $laporan->status = $request->status;
        $laporan->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah status laporan'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelaporan $pelaporan, $laporan)
    {
        $idLaporan = decrypt($laporan);

        $laporan = Pelaporan::where('id', $idLaporan)->first();
        $laporan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus laporan'
        ]);
    }
}