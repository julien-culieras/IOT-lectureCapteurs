<?php
/**
 * Created by PhpStorm.
 * User: julie
 * Date: 14/03/2019
 * Time: 09:53
 */

namespace App\Http\Controllers;


use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller{

    public function index(){
        $types = Type::all();
        return view('types.index')
            ->with('types', $types);
    }

    public function create(){
        return view('types.create');
    }

    public function insert(Request $request){
        $type = new Type($request->all());
        if ($type->save()){
            flash('Type enregistré avec succès')->success();
        }
        else{
            flash('Erreur pendant l\'enregistrement du type')->error();
        }
        return redirect()->route('types.index');
    }

    public function edit(Type $type){
        return view('types.edit')
            ->with('type', $type);
    }

    public function update(Request $request, Type $type){
        if ($type->update($request->all())){
            flash('Type modifié avec succès')->success();
        }
        else{
            flash('Erreur pendant la modification du type')->error();
        }
        return back();
    }

    public function delete(Type $type){
        try {
            if ($type->delete()) {
                flash('Type supprimé avec succès')->success();
            } else {
                flash('Erreur pendant la suppression du type')->error();
            }
        } catch (\Exception $e) {
        }
        return back();
    }
}