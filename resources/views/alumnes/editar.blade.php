@extends('layouts.app')

@section('content')
<h1>Editar Alumne</h1>

<form action="{{ route('alumnes.update', $alumne->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="nom" class="form-label">Nom complet</label>
        <input type="text" class="form-control" id="nom" name="nom" 
               value="{{ $alumne->nom }}" required>
    </div>
    
    <div class="mb-3">
        <label for="correu" class="form-label">Correu electrònic</label>
        <input type="email" class="form-control" id="correu" name="correu" 
               value="{{ $alumne->correu }}" required>
    </div>
    
    <div class="mb-3">
        <label for="adreça" class="form-label">Adreça</label>
        <input type="text" class="form-control" id="adreça" name="adreça" 
               value="{{ $alumne->adreça }}" required>
    </div>
    
    <div class="mb-3">
        <label for="ciutat" class="form-label">Ciutat</label>
        <input type="text" class="form-control" id="ciutat" name="ciutat" 
               value="{{ $alumne->ciutat }}" required>
    </div>
    
    <div class="mb-3">
        <label for="pais" class="form-label">País</label>
        <input type="text" class="form-control" id="pais" name="pais" 
               value="{{ $alumne->pais }}" required>
    </div>
    
    <div class="mb-3">
        <label for="telefon" class="form-label">Telèfon</label>
        <input type="text" class="form-control" id="telefon" name="telefon" 
               value="{{ $alumne->telefon }}" required>
    </div>
    
    <div class="mb-3">
        <label for="master_id" class="form-label">Master</label>
        <select class="form-select" id="master_id" name="master_id" required>
            <option value="">Selecciona un master</option>
            @foreach($masters as $master)
                <option value="{{ $master->id }}" {{ $alumne->master_id == $master->id ? 'selected' : '' }}>
                    {{ $master->nom }}
                </option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Actualitzar</button>
    <a href="{{ route('alumnes.index') }}" class="btn btn-secondary">Cancel·lar</a>
</form>
@endsection