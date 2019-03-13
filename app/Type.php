<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name', 'unit'
    ];

    public function sensors(){
        return $this->hasMany(Sensor::class);
    }

    private $id;
    private $name;
    private $unit;
    private $created_at;
    private $update_at;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdateAt()
    {
        return $this->update_at;
    }


}
