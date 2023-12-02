<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelaporan()
    {
        return $this->hasMany(Pelaporan::class);
    }
}