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

    public function lastRecord(){
        return $this->records()->orderByDesc('recorded_at')->first();
    }

    public function raspberry(){
        return $this->belongsTo(Raspberry::class);
    }

    public static function getByAddress($address){
        return self::where('address', '=', $address)->get()->first();
    }

}
