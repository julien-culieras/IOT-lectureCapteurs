<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Type;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function index(){
        $sensors = Sensor::all();
        return view('sensors.index')->with('sensors', $sensors);
    }

    public function show(Sensor $sensor){
        return view('sensors.show')->with('sensor', $sensor);
    }

    public function create(){
        $types = Type::all();
        return view('sensors.create')
            ->with('types', $types);
    }

    public function insert(Request $request){
        $type = Type::find($request->get('type'));
        $sensor = new Sensor($request->all());
        $sensor->type()->associate($type);
        if ($sensor->save()){
            flash('Capteur enregistré avec succès')->success();
        }
        else{
            flash('Erreur pendant l\'enregistrement du capteur')->error();
        }
        return redirect()->route('sensors.index');
    }

    public function edit(Sensor $sensor){
        $types = Type::all();
        return view('sensors.edit')
            ->with('sensor', $sensor)
            ->with('types', $types);
    }

    public function update(Request $request, Sensor $sensor){
        $type = Type::find($request->get('type'));
        $sensor->type()->associate($type);
        if ($sensor->update($request->all())){
            flash('Capteur modifié avec succès')->success();
        }
        else{
            flash('Erreur pendant la modification du capteur')->error();
        }
        return back();
    }

    public function delete(Sensor $sensor){
        try {
            if ($sensor->delete()) {
                flash('Capteur supprimé avec succès')->success();
            } else {
                flash('Erreur pendant la suppression du capteur')->error();
            }
        } catch (\Exception $e) {
        }
        return back();
    }
}
