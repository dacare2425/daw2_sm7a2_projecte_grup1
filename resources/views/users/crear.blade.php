@extends('layouts.app')

@section('content')
<h1>Crear Nou Usuari</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Correu electrònic</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Contrasenya</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar contrasenya</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    
    <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select class="form-select" id="role" name="role" required>
            <option value="">Selecciona un rol</option>
            <option value="Administrador">Administrador</option>
            <option value="Consultor">Consultor</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel·lar</a>
</form>
@endsection