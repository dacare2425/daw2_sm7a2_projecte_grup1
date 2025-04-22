@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Llistat d'Alumnes</h1>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('alumnes.create') }}" class="btn btn-primary">Nou Alumne</a>
    @endif
</div>

<table class="table table-striped">
    <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>Nom</th>
            <th>Correu</th>
            <th>Ciutat</th>
            <th>Master</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnes as $alumne)
        <tr>
            <td>{{ $alumne->id }}</td>
            <td>{{ $alumne->nom }}</td>
            <td>{{ $alumne->correu }}</td>
            <td>{{ $alumne->ciutat }}</td>
            <td>{{ $alumne->master->nom ?? 'Sense master' }}</td>
            <td>
                <a href="{{ route('alumnes.show', $alumne->id) }}" class="btn btn-sm btn-info">Veure</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('alumnes.edit', $alumne->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('alumnes.destroy', $alumne->id) }}" method="POST" style="display:inline;">
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