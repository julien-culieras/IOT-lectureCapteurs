<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{

    protected $fillable = [
        'address', 'name'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }

}
