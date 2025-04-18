
@extends('layouts.app')

@section('content')
<h1>Editar Master</h1>

<form action="{{ route('masters.update', $master->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="nom" class="form-label">Nom del Master</label>
        <input type="text" class="form-control" id="nom" name="nom" 
               value="{{ $master->nom }}" required>
    </div>
    
    <div class="mb-3">
        <label for="hores" class="form-label">Hores</label>
        <input type="number" class="form-control" id="hores" name="hores" 
               value="{{ $master->hores }}" required>
    </div>
    
    <div class="mb-3">
        <label for="director" class="form-label">Director</label>
        <input type="text" class="form-control" id="director" name="director" 
               value="{{ $master->director }}" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Actualitzar</button>
    <a href="{{ route('masters.index') }}" class="btn btn-secondary">Cancel·lar</a>
</form>
@endsection