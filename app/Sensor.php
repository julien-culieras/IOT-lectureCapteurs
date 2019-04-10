<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{

    protected $fillable = [
        'address', 'name', 'refreshInterval'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }

    public function raspberry(){
        return $this->belongsTo(Raspberry::class);
    }

    public static function getByAddress($address){
        return self::where('address', '=', $address)->get()->first();
    }

    public function getRecords(int $limit = 15, int $offset = 0) {
        return $this->records()->latest("recorded_at")->take($limit)->get();
    }

    public function getNewRecord() {
        $lastRecord = $this->records()->latest("recorded_at")->take(1)->get();
        if($lastRecord->recorded_at->diffInSeconds() <= $this->refreshInterval) {
            return $lastRecord;
        }
        return null;
    }
}
