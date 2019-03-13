<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function index(Request $request){
        $sensors = Sensor::all();
        return view('sensors.index')->with('sensors', $sensors);
    }

    public function show(Request $request, Sensor $sensor){
        return view('sensors.show')->with('sensor', $sensor);
    }

    public function create(Request $request){
        return view('sensors.create')->with('test', 'Create a new sensor');
    }

    public function insert(Request $request){
    }

    public function edit(Request $request, Sensor $sensor){
        return view('sensors.edit')->with('test', 'Edit a sensor');
    }

    public function update(Request $request, Sensor $sensor){
    }

    public function delete(Request $request, Sensor $sensor){
    }
}
