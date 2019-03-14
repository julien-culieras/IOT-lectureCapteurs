@extends('layouts.app')

@section('title', 'Liste des types')


@section('content')
    <a href="{{ route('types.create') }}" class="btn btn-primary">Ajouter</a>
    <h2>Liste des capteurs</h2>
    <table class="table table-striped">
        <tr>
            <th>Nom</th>
            <th>Unité</th>
            <th>actions</th>
        </tr>
        @foreach($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>{{ $type->unit }}</td>
                <td style="display: flex">
                    <a style="margin-left: 5px; margin-right: 5px" class="btn btn-warning" href="{{ route('types.edit', $type) }}">Modif</a>
                    <form style="margin-bottom: 0" action="{{ route('types.delete', $type) }}" method="post">
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
                    text: "La suppression d'un type est définitive et entrainera la suppression de tous les capteurs liés",
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
