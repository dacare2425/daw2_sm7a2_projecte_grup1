@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Detalls del Master</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $master->nom }}</h5>
        <p class="card-text">
            <strong>Hores:</strong> {{ $master->hores }}<br>
            <strong>Director:</strong> {{ $master->director }}<br>
            <strong>Creat el:</strong> {{ $master->created_at->format('d/m/Y H:i') }}<br>
            <strong>Actualitzat el:</strong> {{ $master->updated_at->format('d/m/Y H:i') }}
        </p>
        
        <div class="d-flex gap-2">
            @if(auth()->user()->isAdmin())
                <a href="{{ route('masters.edit', $master->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('masters.destroy', $master->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            @endif
            <a href="{{ route('masters.index') }}" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>
@endsection