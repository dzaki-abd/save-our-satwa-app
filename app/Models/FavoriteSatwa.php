<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteSatwa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'satwa_id', 'nama_lokal', 'deskripsi', 'gambar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function satwa()
    {
        return $this->belongsTo(Satwa::class);
    }

    public static function isExist($user_id, $satwa_id)
    {
        return self::where('user_id', $user_id)
                    ->where('satwa_id', $satwa_id)
                    ->exists();
    }
}
