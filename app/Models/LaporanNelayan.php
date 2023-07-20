<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanNelayan extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function lokasi(){
        return $this->belongsTo(Lokasi::class,"id_lokasi","id");
    }
    
    public function jenis_temuan(){
        return $this->belongsTo(JenisTemuanNelayan::class,"id_jenis_temuan","id");
    }
}
