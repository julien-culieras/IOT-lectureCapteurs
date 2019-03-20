<?php
/**
 * Created by PhpStorm.
 * User: julie
 * Date: 20/03/2019
 * Time: 09:26
 */

namespace App\Http\Controllers;


use App\Raspberry;
use Illuminate\Http\Request;

class RaspberryController extends Controller{

    public function index(){
        $raspberry = Raspberry::all();
        return view('raspberry.index')->with('raspberry', $raspberry);
    }

    public function create(){
        return view('raspberry.create');
    }

    public function insert(Request $request){
        $raspberry = new Raspberry($request->all());
        if ($raspberry->save()){
            flash('Raspberry enregistré avec succès')->success();
        }
        else{
            flash('Erreur pendant l\'enregistrement du raspberry')->error();
        }
        return redirect()->route('raspberry.index');
    }

    public function edit(Raspberry $raspberry){
        return view('raspberry.edit')
            ->with('raspberry', $raspberry);
    }

    public function update(Request $request, Raspberry $raspberry){
        if ($raspberry->update($request->all())){
            flash('Raspberry modifié avec succès')->success();
        }
        else{
            flash('Erreur pendant la modification du raspberry')->error();
        }
        return back();
    }

    public function delete(Raspberry $raspberry){
        try {
            if ($raspberry->delete()) {
                flash('Raspberry supprimé avec succès')->success();
            } else {
                flash('Erreur pendant la suppression du raspberry')->error();
            }
        } catch (\Exception $e) {
        }
        return back();
    }

}