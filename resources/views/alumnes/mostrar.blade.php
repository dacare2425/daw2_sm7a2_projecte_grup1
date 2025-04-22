@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Detalls de l'Alumne</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $alumne->nom }}</h5>
        <p class="card-text">
            <strong>Correu:</strong> {{ $alumne->correu }}<br>
            <strong>Adreça:</strong> {{ $alumne->adreça }}<br>
            <strong>Ciutat:</strong> {{ $alumne->ciutat }}<br>
            <strong>País:</strong> {{ $alumne->pais }}<br>
            <strong>Telèfon:</strong> {{ $alumne->telefon }}<br>
            <strong>Master:</strong> {{ $alumne->master->nom ?? 'Sense master' }}<br>
            <strong>Creat el:</strong> {{ $alumne->created_at->format('d/m/Y H:i') }}<br>
            <strong>Actualitzat el:</strong> {{ $alumne->updated_at->format('d/m/Y H:i') }}
        </p>
        
        <div class="d-flex gap-2">
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('alumnes.edit', $alumne->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('alumnes.destroy', $alumne->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            @endif
            <a href="{{ route('alumnes.index') }}" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>
@endsection