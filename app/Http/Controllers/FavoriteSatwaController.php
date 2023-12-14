<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteSatwa;
use App\Models\User;

class FavoriteSatwaController extends Controller
{
    public function addFavorite(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'satwa_id' => 'required',
                'nama_lokal' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'required',
            ]);

            $user = User::findOrFail($validatedData['user_id']);
            $satwaId = $validatedData['satwa_id'];

            FavoriteSatwa::create([
                'user_id' => $user->id,
                'satwa_id' => $satwaId,
                'nama_lokal' => $validatedData['nama_lokal'],
                'deskripsi' => $validatedData['deskripsi'],
                'gambar' => $validatedData['gambar'],
            ]);

            return redirect()->back()->with('success', 'Satwa ditambahkan ke favorit.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan satwa ke favorit.');
        }
    }

    public function removeFavorite(Request $request)
    {
        $userId = $request->input('user_id');
        $satwaId = $request->input('satwa_id');

        FavoriteSatwa::where('user_id', $userId)
            ->where('satwa_id', $satwaId)
            ->delete();

        return redirect()->back()->with('success', 'Satwa dihapus dari favorit.');
    }
}
