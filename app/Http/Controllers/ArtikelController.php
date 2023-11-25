<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.artikel.index');
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
    public function store(StoreArtikelRequest $request)
    {
        $dataArtikel = Artikel::find($request->id);
        $dataArtikel->addMedia($request->file('filepond'))->toMediaCollection('images');

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        //
    }

    public function getDataArtikel()
    {
        $dataArtikel = Artikel::all();

        return DataTables::of($dataArtikel)
            ->addIndexColumn()
            ->addColumn('judul', function($row){
                return $row->judul;
            })
            ->addColumn('slug', function($row){
                return $row->slug;
            })
            ->addColumn('konten', function($row){
                return $row->konten;
            })
            ->addColumn('gambar', function($row){
                return $row->gambar;
            })
            ->addColumn('users_id', function($row){
                return $row->users_id;
            })
            ->addColumn('di_posting', function($row){
                if($row->di_posting === 'Ya'){
                    return '<span class="badge rounded-pill text-bg-info">Ya</span>';
                } else {
                    return '<span class="badge rounded-pill text-bg-warning">Tidak</span>';
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Action">
                        <button type="button" class="btn btn-warning btn-md btn-icon" onclick="editRole(' . $row->id . ')" title="Ubah"><i class="fa-solid fa-pen"></i></button>
                        <button type="button" class="btn btn-danger btn-md btn-icon" onclick="destroyRole(' . $row->id . ')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                    </div>
                            ';
                return $actionBtn;
            })
            ->rawColumns(['action','di_posting'])
            ->make(true);
    }
}
