<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biota extends Model
{
    use HasFactory;

    public function jenisBiota(){
        return $this->hasOne(JenisBiota::class, 'id', 'id_jenis_biota');
    }
}
