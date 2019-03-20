<?php
/**
 * Created by PhpStorm.
 * User: julie
 * Date: 20/03/2019
 * Time: 09:07
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Raspberry extends Model {

    protected $table = 'raspberry';

    protected $fillable = [
        'address', 'name', 'state'
    ];

    public function sensors(){
        return $this->hasMany(Sensor::class);
    }

    public static function getByAddress($address){
        return self::where('address', '=', $address)->get()->first();
    }
}