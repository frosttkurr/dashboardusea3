<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBiota extends Model
{
    use HasFactory;

    public function biota(){
        return $this->belongsTo(Biota::class, 'id_jenis_biota', 'id');
    }
}
