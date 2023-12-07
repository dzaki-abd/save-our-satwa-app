<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Satwa extends Model
{
    use HasFactory;

    protected $table = 'satwas';
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('nama_lokal', 'like', '%' . $search . '%')
                    ->orWhere('nama_ilmiah', 'like', '%' . $search . '%')
                    ->orWhere('nama_inggris', 'like', '%' . $search . '%');
            });
        });
        
        $query->when($filters['lokasi'] ?? false, function ($query, $lokasi) {
            $query->where('lokasi', $lokasi);
        });

        $query->when($filters['status'] ?? false, function ($query, $status) {
            $query->where('kategori_iucn', $status);
        });

        $query->when($filters['tren_populasi'] ?? false, function ($query, $tren_populasi) {
            $query->where('tren_populasi', $tren_populasi);
        });
    }

    public function pelaporan()
    {
        return $this->hasMany(Pelaporan::class);
    }
}