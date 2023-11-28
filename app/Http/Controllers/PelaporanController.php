<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePelaporanRequest;
use App\Http\Requests\UpdatePelaporanRequest;

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
        $laporan = Pelaporan::where('status', $filter)->get();

        return DataTables::of($laporan)
            ->addIndexColumn()
            ->addColumn('nama_pelapor', function ($row) {
                $user = User::find($row->user_id);
                return $user->name;
            })
            ->addColumn('tanggal_kejadian', function ($row) {
                return date('d F Y', strtotime($row->waktu_kejadian));
            })
            ->addColumn('jenis_pelanggaran', function ($row) {
                return $row->jenis_pelanggaran;
            })
            ->addColumn('jenis_satwa', function ($row) {
                return $row->jenis_satwa;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'Ditolak') {
                    $badgeStatus = '<span class="badge text-bg-danger">' . $row->status . '</span>';
                } elseif ($row->status == 'Ditinjau') {
                    $badgeStatus = '<span class="badge text-bg-warning">' . $row->status . '</span>';
                } else {
                    $badgeStatus = '<span class="badge text-bg-success">' . $row->status . '</span>';
                }
                return $badgeStatus;
            })
            ->addColumn('action', function ($row) {
                $show = route('dashboard.laporan.show', encrypt($row->id));
                $actionBtn = '
                    <div class="btn-group" id="group-edit-' . $row->id . '" role="group" aria-label="Action">
                        <a type="button" class="btn btn-primary btn-sm btn-icon" title="Ubah" href="' . $show . '"><i class="fa-solid fa-eye"></i></a>
                        <button type="button" class="btn btn-danger btn-sm btn-icon" title="Hapus"><i class="fa-solid fa-trash"></i></button>
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
    public function destroy(Pelaporan $pelaporan)
    {
        //
    }
}