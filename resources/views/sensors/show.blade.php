@extends('layouts.app')

@section('title', 'Visu capteur')

@section('content')
    <div id="app" data-sensor="{{ $sensor->id }}" data-refreshInterval="{{ $sensor->refreshInterval }}">

    </div>

@endsection