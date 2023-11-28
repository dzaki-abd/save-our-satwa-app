<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiKejadian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelaporan()
    {
        return $this->belongsTo(Pelaporan::class);
    }
}