@extends('layouts.app')

@section('title', 'Modification type')

@section('content')
    <h2>Modification type {{ $type->name }}</h2>

    <form method="POST" action="{{ route('types.update', $type) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $type->name }}">
        </div>
        <div class="form-group">
            <label for="unit">Unité</label>
            <input type="text" name="unit" id="unit" class="form-control" value="{{ $type->unit }}">
        </div>

        <button type="submit" class="btn btn-lg btn-warning">Modifier</button>
    </form>
@endsection