@extends('layouts.app')

@section('title', 'Liste des capteurs')


@section('content')
    <a href="{{ route('sensors.create') }}" class="btn btn-primary">Ajouter</a>
    <h2>Liste des capteurs</h2>
    <table class="table table-striped">
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Raspberry</th>
            <th>Interval refresh (s)</th>
            <th>actions</th>
        </tr>
        @foreach($sensors as $sensor)
            <tr>
                <td>{{ $sensor->name }}</td>
                <td>{{ $sensor->address }}</td>
                <td>{{ $sensor->raspberry->name }} @ {{ $sensor->raspberry->address }}</td>
                <td>{{ $sensor->refreshInterval }}</td>
                <td style="display: flex">
                    <a class="btn btn-primary" href="{{ route('sensors.show', $sensor) }}">Voir</a>
                    <a style="margin-left: 5px; margin-right: 5px" class="btn btn-warning" href="{{ route('sensors.edit', $sensor) }}">Modif</a>
                    <form style="margin-bottom: 0" action="{{ route('sensors.delete', $sensor) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btnDelete" value="SUPPR">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            let btns = $('.btnDelete');
            btns.click(function (e) {
                e.preventDefault();
                let btn = $(this);
                let form = btn.parent();
                Swal.fire({
                    title: 'Etes vous sur ?',
                    text: "La suppression d'un capteur est définitive",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#ababab',
                    confirmButtonText: 'Supprimer',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    }
                })
            });
        });
    </script>
@endsection