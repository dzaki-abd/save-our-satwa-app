<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Artikel extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'artikels';
    protected $guarded = ['id'];
}
