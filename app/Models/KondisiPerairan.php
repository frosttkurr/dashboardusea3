<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiPerairan extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function lokasi(){
        return $this->belongsTo(Lokasi::class,"id_lokasi","id");
    }
}
