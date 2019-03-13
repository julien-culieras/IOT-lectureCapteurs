<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function sensor(){
        return $this->belongsTo(Sensor::class);
    }
}
