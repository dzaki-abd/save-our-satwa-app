<?php

namespace App\Http\Controllers;

use App\Models\Satwa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

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
            $request->file('image')->storeAs('img/satwa_images', $namaFile, 'public');
            
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
                'gambar' => $namaFile,
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
                $namaFile = 'satwa-' . time() . '.' .  $request->image_edit->extension();
                $request->file('image_edit')->storeAs('img/satwa_images', $namaFile, 'public');

                $image_path = public_path('storage/img/satwa_images/' . $satwa->gambar);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            } else {
                $namaFile = $satwa->gambar;
            }

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

            $image_path = public_path('storage/img/satwa_images/' . $satwa->gambar);
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
                return $row->populasi;
            })
            ->addColumn('kategori_iucn', function ($row) {
                return $row->kategori_iucn;
            })
            ->addColumn('lokasi', function ($row) {
                return $row->lokasi;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Action">
                        <button type="button" class="btn btn-primary btn-md btn-icon" onclick="editSatwa(' . $row->id . ')" title="Detail / Edit"><i class="fa-solid fa-eye"></i></button>
                        <button type="button" class="btn btn-danger btn-md btn-icon" onclick="destroySatwa(' . $row->id . ')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
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
}
