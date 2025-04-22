@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Llistat de Masters</h1>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('masters.create') }}" class="btn btn-primary">Nou Master</a>
    @endif
</div>

<table class="table table-striped">
    <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>Nom</th>
            <th>Hores</th>
            <th>Director</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($masters as $master)
        <tr>
            <td>{{ $master->id }}</td>
            <td>{{ $master->nom }}</td>
            <td>{{ $master->hores }}</td>
            <td>{{ $master->director }}</td>
            <td>
                <a href="{{ route('masters.show', $master->id) }}" class="btn btn-sm btn-info">Veure</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('masters.edit', $master->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('masters.destroy', $master->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection