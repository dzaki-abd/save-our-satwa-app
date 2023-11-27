<?php

namespace App\Http\Controllers;

use App\Models\Satwa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class SatwaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.satwa.index');
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
        $validatedData = $request->validate([
            'nama_ilmiah' => 'required|string',
            'nama_lokal' => 'required|string',
            'populasi' => 'required|string',
            'kategori_iucn' => 'required|string',
            'lokasi' => 'required|string',
        ]);
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
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
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
                $url_edit = route('dashboard.artikel.show', ['artikel' => $row->id]);
                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Action">
                        <a href="' . $url_edit . '" class="btn btn-primary btn-md btn-icon" title="Detail / Edit"><i class="fa-solid fa-eye"></i></a>
                        <button type="button" class="btn btn-danger btn-md btn-icon" onclick="destroyArtikel(' . $row->id . ')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
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
