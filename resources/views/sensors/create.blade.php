@extends('layouts.app')

@section('title', 'Nouveau capteur')

@section('content')
    <h2>Ajouter un capteur</h2>

    <form method="POST" action="{{ route('sensors.insert') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Adresse Mac</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Ajouter</button>
    </form>
@endsection