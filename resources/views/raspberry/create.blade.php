@extends('layouts.app')

@section('title', 'Nouveau raspberry')

@section('content')
    <h2>Ajouter un raspberry</h2>

    <form method="POST" action="{{ route('raspberry.insert') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Adresse Mac</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>

        <button type="submit" class="btn btn-lg btn-success">Ajouter</button>
    </form>
@endsection