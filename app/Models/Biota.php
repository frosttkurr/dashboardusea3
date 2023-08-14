<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biota extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function jenisBiota(){
        return $this->hasOne(JenisBiota::class, 'id', 'id_jenis_biota');
    }
}
