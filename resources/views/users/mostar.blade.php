@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Detalls de l'Usuari</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">
            <strong>Correu:</strong> {{ $user->email }}<br>
            <strong>Rol:</strong> {{ $user->role }}<br>
            <strong>Creat el:</strong> {{ $user->created_at->format('d/m/Y H:i') }}<br>
            <strong>Actualitzat el:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}
        </p>
        
        <div class="d-flex gap-2">
            @can('manage-users')
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            @endcan
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>
@endsection