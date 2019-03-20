@extends('layouts.app')

@section('title', 'Modification capteur')

@section('content')
    <h2>Modification capteur {{ $sensor->name }}</h2>

    <form method="POST" action="{{ route('sensors.update', $sensor) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $sensor->name }}">
        </div>
        <div class="form-group">
            <label for="address">Adresse Mac</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $sensor->address }}">
        </div>

        <div class="form-group">
            <label for="refreshInterval">Interval de raffraichissement (secondes)</label>
            <input type="number" name="refreshInterval" id="refreshInterval" class="form-control" value="{{ $sensor->refreshInterval }}">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                @foreach($types as $type)
                    <option @if($type->id == $sensor->type->id) selected @endif
                        value="{{ $type->id }}">
                            {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="raspberry">Raspberry</label>
            <select name="raspberry" id="raspberry" class="form-control">
                @foreach($raspberry as $raspberryItem)
                    <option @if($raspberryItem->id == $sensor->raspberry->id) selected @endif
                    value="{{ $raspberryItem->id }}">
                        {{ $raspberryItem->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-lg btn-warning">Modifier</button>
    </form>
@endsection