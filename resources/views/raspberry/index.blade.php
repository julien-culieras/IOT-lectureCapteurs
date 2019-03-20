@extends('layouts.app')

@section('title', 'Liste des raspberry')


@section('content')

    <style>
        .greenCircle {
            width: 20px;
            height: 20px;
            border-radius: 10px;
            background: #338036;
        }
        .redCircle {
            width: 20px;
            height: 20px;
            border-radius: 10px;
            background: #c21115;
        }
    </style>

    <a href="{{ route('raspberry.create') }}" class="btn btn-primary">Ajouter</a>
    <h2>Liste des raspberry</h2>
    <table class="table table-striped">
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Online ?</th>
            <th>actions</th>
        </tr>
        @foreach($raspberry as $raspberryItem)
            <tr>
                <td>{{ $raspberryItem->name }}</td>
                <td>{{ $raspberryItem->address }}</td>
                <td>@if($raspberryItem->state) <a href="{{ route('raspberry.setOffline', $raspberryItem) }}"><div class="greenCircle"></div></a> @else <a href="{{ route('raspberry.setOnline', $raspberryItem) }}"><div class="redCircle"></div></a> @endif</td>
                <td style="display: flex">
                    <a style="margin-left: 5px; margin-right: 5px" class="btn btn-warning" href="{{ route('raspberry.edit', $raspberryItem) }}">Modif</a>
                    <form style="margin-bottom: 0" action="{{ route('raspberry.delete', $raspberryItem) }}" method="post">
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
                    text: "La suppression d'un raspberry est définitive",
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