@extends('layouts.app')

@section('title', 'Nouveau type')

@section('content')
    <h2>Ajouter un type</h2>

    <form method="POST" action="{{ route('types.insert') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="unit">Unité</label>
            <input type="text" name="unit" id="unit" class="form-control">
        </div>

        <button type="submit" class="btn btn-lg btn-success">Ajouter</button>
    </form>
@endsection