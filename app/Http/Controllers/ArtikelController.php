<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countArtikel = Artikel::count();
        $countArtikelPosting = Artikel::where('di_posting', 'Ya')->count();
        $countArtikelTidakPosting = Artikel::where('di_posting', 'Tidak')->count();

        return view('dashboard.artikel.index', compact('countArtikel', 'countArtikelPosting', 'countArtikelTidakPosting'));
    }

    public function addArtikelPage()
    {
        return view('dashboard.artikel.add');
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
                'jenis_artikel' => 'required|in:Artikel,Berita',
                'di_posting' => 'required|in:Ya,Tidak',
                'judul_artikel' => 'required|string',
                'tag_artikel' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'konten' => 'required|string',
            ]);

            $users_id = auth()->user()->id;

            $namaFile = 'artikel-' . time() . '.' .  $request->image->extension();
            $request->file('image')->storeAs('img/artikel_images', $namaFile, 'public');

            $slug = Str::slug($validatedData['judul_artikel'], '-');

            $artikel = new Artikel([
                'jenis' => $validatedData['jenis_artikel'],
                'di_posting' => $validatedData['di_posting'],
                'judul' => $validatedData['judul_artikel'],
                'tag' => $validatedData['tag_artikel'],
                'gambar' => $namaFile,
                'konten' => $validatedData['konten'],
                'users_id' => $users_id,
                'slug' => $slug,
            ]);
            $artikel->save();

            return redirect()->route('dashboard.artikel.index')->with('success', $validatedData['jenis_artikel'] . ' berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.artikel.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('dashboard.artikel.detail', compact('artikel'));
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
    public function update(Request $request, $id)
    {
        try {
            $artikel = Artikel::findOrFail($id);

            $validatedData = $request->validate([
                'jenis_artikel' => 'required|in:Artikel,Berita',
                'di_posting' => 'required|in:Ya,Tidak',
                'judul_artikel' => 'required|string',
                'tag_artikel' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'konten' => 'required|string',
            ]);

            $users_id = auth()->user()->id;

            if ($request->hasFile('image')) {
                $namaFile = 'artikel-' . time() . '.' .  $request->image->extension();
                $request->file('image')->storeAs('img/artikel_images', $namaFile, 'public');
                $artikel->gambar = $namaFile;
            }

            $slug = Str::slug($validatedData['judul_artikel'], '-');

            $artikel->jenis = $validatedData['jenis_artikel'];
            $artikel->di_posting = $validatedData['di_posting'];
            $artikel->judul = $validatedData['judul_artikel'];
            $artikel->tag = $validatedData['tag_artikel'];
            $artikel->konten = $validatedData['konten'];
            $artikel->users_id = $users_id;
            $artikel->slug = $slug;

            // Save the artikel to the database
            $artikel->save();

            // Redirect or perform any other action as needed
            return redirect()->route('dashboard.artikel.index')->with('success', $validatedData['jenis_artikel'] . ' berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.artikel.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $artikel = Artikel::findOrFail($id);
            $image_path = public_path('storage/img/artikel_images/' . $artikel->gambar);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $artikel->delete();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getDataArtikel()
    {
        $dataArtikel = Artikel::join('users', 'artikels.users_id', '=', 'users.id')
            ->select('artikels.*', 'users.name as penulis')
            ->get();

        return DataTables::of($dataArtikel)
            ->addIndexColumn()
            ->addColumn('jenis', function ($row) {
                return $row->jenis;
            })
            ->addColumn('judul', function ($row) {
                return $row->judul;
            })
            ->addColumn('penulis', function ($row) {
                return $row->penulis;
            })
            ->addColumn('di_posting', function ($row) {
                if ($row->di_posting === 'Ya') {
                    return '<span class="badge rounded-pill text-bg-info">Ya</span>';
                } else {
                    return '<span class="badge rounded-pill text-bg-warning">Tidak</span>';
                }
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
            ->rawColumns(['action', 'di_posting'])
            ->make(true);
    }
}
