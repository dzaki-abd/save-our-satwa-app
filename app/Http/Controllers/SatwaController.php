<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Satwa;
use App\Models\Pelaporan;
use App\Models\Pelanggaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class SatwaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countSatwa = Satwa::count();
        return view('dashboard.satwa.index', compact('countSatwa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'taxonid' => 'required',
                'nama_ilmiah' => 'required',
                'nama_lokal' => 'required',
                'nama_inggris' => 'required',
                'deskripsi' => 'required',
                'kingdom' => 'required',
                'filum' => 'required',
                'kelas' => 'required',
                'ordo' => 'required',
                'famili' => 'required',
                'genus' => 'required',
                'tren_populasi' => 'required',
                'kategori_iucn' => 'required',
                'populasi' => 'required',
                'lokasi' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);
    
            $namaFile = 'satwa-' . time() . '.' . $request->image->extension();
            $namaFile_db = 'satwa_images/' . $namaFile;
            $request->file('image')->move(public_path('storage/satwa_images'), $namaFile);
            
            $slug = Str::slug($validatedData['nama_lokal'], '-');
    
            $populasi = (int) $validatedData['populasi'];
            
            $satwa = Satwa::create([
                'taxonid' => $validatedData['taxonid'],
                'nama_ilmiah' => $validatedData['nama_ilmiah'],
                'nama_lokal' => $validatedData['nama_lokal'],
                'nama_inggris' => $validatedData['nama_inggris'],
                'deskripsi' => $validatedData['deskripsi'],
                'kingdom' => $validatedData['kingdom'],
                'filum' => $validatedData['filum'],
                'kelas' => $validatedData['kelas'],
                'ordo' => $validatedData['ordo'],
                'famili' => $validatedData['famili'],
                'genus' => $validatedData['genus'],
                'tren_populasi' => $validatedData['tren_populasi'],
                'kategori_iucn' => $validatedData['kategori_iucn'],
                'gambar' => $namaFile_db,
                'populasi' => $populasi,
                'lokasi' => $validatedData['lokasi'],
                'slug' => $slug,
            ]);
    
            $satwa->save();
    
            return redirect()->back()->with('success', 'Satwa berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $satwa = Satwa::findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => $satwa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $satwa = Satwa::findOrFail($id);

            $validatedData = $request->validate([
                'taxonid' => 'required',
                'nama_ilmiah' => 'required',
                'nama_lokal' => 'required',
                'nama_inggris' => 'required',
                'deskripsi' => 'required',
                'kingdom' => 'required',
                'filum' => 'required',
                'kelas' => 'required',
                'ordo' => 'required',
                'famili' => 'required',
                'genus' => 'required',
                'tren_populasi' => 'required',
                'kategori_iucn' => 'required',
                'populasi' => 'required',
                'lokasi' => 'required',
                'image_edit' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $populasi = (int) $validatedData['populasi'];

            $slug = Str::slug($validatedData['nama_lokal'], '-');

            if ($request->hasFile('image_edit')) {
                if ($satwa->gambar) {
                    $pathToOldImage = public_path('storage/' . $satwa->gambar);
                    if (file_exists($pathToOldImage)) {
                        unlink($pathToOldImage);
                    }
                }

                $namaFile = 'satwa_images/satwa-' . time() . '.' .  $request->image_edit->extension();
                $request->file('image_edit')->storeAs('', $namaFile, 'public');
                $satwa->gambar = $namaFile;

                $satwa->update([
                    'taxonid' => $validatedData['taxonid'],
                    'nama_ilmiah' => $validatedData['nama_ilmiah'],
                    'nama_lokal' => $validatedData['nama_lokal'],
                    'nama_inggris' => $validatedData['nama_inggris'],
                    'deskripsi' => $validatedData['deskripsi'],
                    'kingdom' => $validatedData['kingdom'],
                    'filum' => $validatedData['filum'],
                    'kelas' => $validatedData['kelas'],
                    'ordo' => $validatedData['ordo'],
                    'famili' => $validatedData['famili'],
                    'genus' => $validatedData['genus'],
                    'tren_populasi' => $validatedData['tren_populasi'],
                    'kategori_iucn' => $validatedData['kategori_iucn'],
                    'gambar' => $namaFile,
                    'populasi' => $populasi,
                    'lokasi' => $validatedData['lokasi'],
                    'slug' => $slug,
                ]);
            } else {
                $satwa->update([
                    'taxonid' => $validatedData['taxonid'],
                    'nama_ilmiah' => $validatedData['nama_ilmiah'],
                    'nama_lokal' => $validatedData['nama_lokal'],
                    'nama_inggris' => $validatedData['nama_inggris'],
                    'deskripsi' => $validatedData['deskripsi'],
                    'kingdom' => $validatedData['kingdom'],
                    'filum' => $validatedData['filum'],
                    'kelas' => $validatedData['kelas'],
                    'ordo' => $validatedData['ordo'],
                    'famili' => $validatedData['famili'],
                    'genus' => $validatedData['genus'],
                    'tren_populasi' => $validatedData['tren_populasi'],
                    'kategori_iucn' => $validatedData['kategori_iucn'],
                    'populasi' => $populasi,
                    'lokasi' => $validatedData['lokasi'],
                    'slug' => $slug,
                ]);
            }

            return redirect()->back()->with('success', $validatedData['nama_ilmiah'] . ' berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $satwa = Satwa::findOrFail($id);

            $image_path = public_path('storage/' . $satwa->gambar);
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $satwa->delete();

            return response()->json([
                'status' => true,
                'message' => 'Satwa berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getDataSatwa()
    {
        $dataSatwa = Satwa::all();

        return DataTables::of($dataSatwa)
            ->addIndexColumn()
            ->addColumn('nama_ilmiah', function ($row) {
                return $row->nama_ilmiah;
            })
            ->addColumn('nama_lokal', function ($row) {
                return $row->nama_lokal;
            })
            ->addColumn('populasi', function ($row) {
                $populasi = number_format($row->populasi, 0, ',', '.');
                return $populasi;
            })
            ->addColumn('kategori_iucn', function ($row) {
                return $row->kategori_iucn;
            })
            ->addColumn('lokasi', function ($row) {
                return $row->lokasi;
            })
            ->addColumn('action', function ($row) {
                $pelaporanSatwaUrl = route('dashboard.satwa.pelaporan-satwa', $row->id);
                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Action">
                        <button type="button" class="btn btn-primary btn-md btn-icon" onclick="editSatwa(' . $row->id . ')" title="Detail / Edit"><i class="fa-solid fa-eye"></i></button>
                        <button type="button" class="btn btn-danger btn-md btn-icon" onclick="destroySatwa(' . $row->id . ')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        <a href="' . $pelaporanSatwaUrl . '" type="button" class="btn btn-info btn-md btn-icon" title="Daftar Pelaporan Satwa"><i class="fa-solid fa-table-list"></i></a>
                    </div>
                            ';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getDataFromAPI(Request $request)
    {
        $namaIlmiah = $request->input('nama_ilmiah');

        $apiUrl = 'https://apiv3.iucnredlist.org/api/v3/species/' . $namaIlmiah . '?token=9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee';

        $response = Http::get($apiUrl);

        // Mengecek apakah request berhasil (kode status 200)
        if ($response->successful()) {
            // Mendapatkan data JSON dari response
            $data = $response->json();

            // Lakukan sesuatu dengan data, misalnya tampilkan atau simpan ke database
            return response()->json([
                'nama_inggris' => $data['result'][0]['main_common_name'],
                'taxonid' => $data['result'][0]['taxonid'],
                'kingdom' => $data['result'][0]['kingdom'],
                'filum' => $data['result'][0]['phylum'],
                'kelas' => $data['result'][0]['class'],
                'ordo' => $data['result'][0]['order'],
                'famili' => $data['result'][0]['family'],
                'genus' => $data['result'][0]['genus'],
                'population_trend' => $data['result'][0]['population_trend'],
                'kategori_iucn' => $data['result'][0]['category'],
            ]);
        } else {
            // Menangani kasus jika request tidak berhasil
            return response()->json(['error' => 'Gagal mengambil data dari API'], 500);
        }
    }

    public function pelaporanSatwa($satwa) {
        // $satwa = Satwa::where('id', $satwa);

        // return $satwa;
            
        if (Pelaporan::where('satwa_id', $satwa)->exists()) {
            $satwa = DB::table('satwas')
            ->join('pelaporans', 'satwas.id', '=', 'pelaporans.satwa_id')
            ->where('satwas.id', $satwa)
            // ->where('pelaporans.status', '=', 'Disetujui')
            ->select('satwas.*', 'pelaporans.*')
            ->get();
        } else {
            $satwa = DB::table('satwas')
            ->where('satwas.id', $satwa)
            ->select('satwas.*')
            ->get();
        }

        // $satwa = $satwa->select('satwas.*', 'pelaporans.*')->get();
        // $satwa = $satwa->join('pelaporans', 'satwas.id', '=', 'pelaporans.satwa_id')->get();
        // return $satwa;

        if (request()->ajax()) {
            return DataTables::of($satwa)
            ->addIndexColumn()
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
                return $row->satwa_id ? Satwa::find($row->satwa_id)->nama_lokal : $row->satwa_lain;
            })
            ->addColumn('jumlah_satwa', function ($row) {
                return $row->jumlah_satwa;
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
                        <a type="button" target="_blank" class="btn btn-primary btn-md btn-icon" title="Ubah" href="' . $show . '"><i class="fa-solid fa-eye"></i></a>
                    </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
        }

        return view('dashboard.satwa.laporan', compact('satwa'));
    }
}