<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'value'
    ];

    protected $dates = [
        'recorded_at'
    ];

    public function sensor(){
        return $this->belongsTo(Sensor::class);
    }

    public static function createNow($sensor, $value):self {
        $record = new self();
        $record->value = $value;
        $record->sensor()->associate($sensor);
        $record->recorded_at = Carbon::now('Europe/Paris')->toDateTimeString();
        return $record;
    }
}
