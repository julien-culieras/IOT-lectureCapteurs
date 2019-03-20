@extends('layouts.app')

@section('title', 'Modification raspberry')

@section('content')
    <h2>Modification raspberry {{ $raspberry->name }}</h2>

    <form method="POST" action="{{ route('raspberry.update', $raspberry) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $raspberry->name }}">
        </div>
        <div class="form-group">
            <label for="address">Adresse Mac</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $raspberry->address }}">
        </div>

        <button type="submit" class="btn btn-lg btn-warning">Modifier</button>
    </form>
@endsection