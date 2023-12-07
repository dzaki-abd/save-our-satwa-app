<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%');
            });
        });
        
        $query->when($filters['jenis'] ?? false, function ($query, $jenis) {
            $query->where('jenis', $jenis);
        });

        $query->when($filters['kata_kunci'] ?? false, function ($query, $kata_kunci) {
            $query->where('tag', 'like', '%' . $kata_kunci . '%');
        });
    }
}
