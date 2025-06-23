<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Provinsi;

class Kabkota extends Model
{
    protected $fillable = ['nama', 'provinsi_id'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}