<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Kabkota;
use App\Models\JenisFaskes;

class Faskes extends Model
{
    protected $fillable = [
    'nama',
    'nama_pengelola',
    'alamat',
    'website',
    'email',
    'kabkota_id',
    'jenis_faskes_id',
    'kategori_id',
    'rating',
    'latitude',
    'longitude',

    ];

    public $timestamp = false;

    public function kabkota()
{
    return $this->belongsTo(Kabkota::class);
}

public function jenisFaskes()
{
    return $this->belongsTo(JenisFaskes::class);
}

public function kategori()
{
    return $this->belongsTo(Kategori::class);
}
}