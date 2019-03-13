<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function index(Request $request){
        return view('sensors.create')->with('test', 'Display all sensors');
    }
    public function show(Request $request, Sensor $sensor){
        return view('sensors.create')->with('test', 'Display specific sensor');
    }
    public function create(Request $request){
        return view('sensors.create')->with('test', 'Create a new sensor');
    }
    public function insert(Request $request){
        return view('sensors.create')->with('test', '(request)Insert a new sensor in db');
    }
    public function edit(Request $request){
        return view('sensors.create')->with('test', 'Edit a sensor');
    }
    public function update(Request $request){
        return view('sensors.create')->with('test', '(request)Update a new sensor');
    }
    public function delete(Request $request){
        return view('sensors.create')->with('test', 'delete a new sensor');
    }
}
