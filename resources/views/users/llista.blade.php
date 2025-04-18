@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Llistat d'Usuaris</h1>
    @can('manage-users')
    <a href="{{ route('users.create') }}" class="btn btn-primary">Nou Usuari</a>
    @endcan
</div>

<table class="table table-striped">
    <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>Nom</th>
            <th>Correu</th>
            <th>Rol</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">Veure</a>
                @can('manage-users')
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection