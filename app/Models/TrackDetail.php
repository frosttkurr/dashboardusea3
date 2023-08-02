<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Log;
use Auth;

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

    public static function destroy($id_track_detail)
    {
        $track_detail = TrackDetail::find($id_track_detail);
        if ($track_detail) {
            $track_detail->delete();

            $log = new Log();
            $log->createLog(Auth::user()->name, 'delete', 'Delete track detail data (ID: '.$track_detail->id.' | ID Track: '.$track_detail->id_track.')', '\App\TrackDetail', 'TrackDetailController@destroy');
        }
    }
}
