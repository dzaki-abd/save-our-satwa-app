<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteArtikel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'artikel_id', 'judul', 'konten', 'gambar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }

    public static function isExist($user_id, $artikel_id)
    {
        return self::where('user_id', $user_id)
                    ->where('artikel_id', $artikel_id)
                    ->exists();
    }
}
