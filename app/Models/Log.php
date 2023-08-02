<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function createLog($username, $activity, $description, $model, $controller) {
        $this::create([
            'username' => $username,
            'activity' => $activity,
            'description' => $description,
            'model' => $model,
            'controller' => $controller,
        ]);
    }
}
