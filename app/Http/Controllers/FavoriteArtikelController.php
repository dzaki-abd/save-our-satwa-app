<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteArtikel;
use App\Models\User;

class FavoriteArtikelController extends Controller
{
    public function addFavorite(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'artikel_id' => 'required',
                'judul' => 'required',
                'konten' => 'required',
                'gambar' => 'required',
            ]);

            $user = User::findOrFail($validatedData['user_id']);
            $artikelId = $validatedData['artikel_id'];

            FavoriteArtikel::create([
                'user_id' => $user->id,
                'artikel_id' => $artikelId,
                'judul' => $validatedData['judul'],
                'konten' => $validatedData['konten'],
                'gambar' => $validatedData['gambar'],
            ]);

            return redirect()->back()->with('success', 'Artikel ditambahkan ke favorit.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan artikel ke favorit.');
        }
    }

    public function removeFavorite(Request $request)
    {
        $userId = $request->input('user_id');
        $artikelId = $request->input('artikel_id');

        FavoriteArtikel::where('user_id', $userId)
            ->where('artikel_id', $artikelId)
            ->delete();

        return redirect()->back()->with('success', 'Artikel dihapus dari favorit.');
    }
}
