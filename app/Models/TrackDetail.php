<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackDetail extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function track(){
        return $this->belongsTo(Track::class,"id_track","id");
    }
    
    public function biota(){
        return $this->belongsTo(Biota::class,"id_biota","id");
    }
    
    public function lokasi(){
        return $this->belongsTo(Lokasi::class,"id_lokasi","id");
    }
}
