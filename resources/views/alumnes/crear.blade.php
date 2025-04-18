@extends('layouts.app')

@section('content')
<h1>Crear Nou Alumne</h1>

<form action="{{ route('alumnes.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="nom" class="form-label">Nom complet</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    
    <div class="mb-3">
        <label for="correu" class="form-label">Correu electrònic</label>
        <input type="email" class="form-control" id="correu" name="correu" required>
    </div>
    
    <div class="mb-3">
        <label for="adreça" class="form-label">Adreça</label>
        <input type="text" class="form-control" id="adreça" name="adreça" required>
    </div>
    
    <div class="mb-3">
        <label for="ciutat" class="form-label">Ciutat</label>
        <input type="text" class="form-control" id="ciutat" name="ciutat" required>
    </div>
    
    <div class="mb-3">
        <label for="pais" class="form-label">País</label>
        <input type="text" class="form-control" id="pais" name="pais" required>
    </div>
    
    <div class="mb-3">
        <label for="telefon" class="form-label">Telèfon</label>
        <input type="text" class="form-control" id="telefon" name="telefon" required>
    </div>
    
    <div class="mb-3">
        <label for="master_id" class="form-label">Master</label>
        <select class="form-select" id="master_id" name="master_id" required>
            <option value="">Selecciona un master</option>
            @foreach($masters as $master)
                <option value="{{ $master->id }}">{{ $master->nom }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{ route('alumnes.index') }}" class="btn btn-secondary">Cancel·lar</a>
</form>
@endsection