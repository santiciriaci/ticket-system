@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Ticket</h2>
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <div class="form-group">
            <label>Nombre del ticket</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tipo de ticket</label>
            <select name="type" class="form-control">
                <option value="1">Tipo 1</option>
                <option value="2">Tipo 2</option>
                <option value="3">Tipo 3</option>
            </select>
        </div>
        <div class="form-group">
            <label>Modo de transporte</label>
            <select name="transport_mode" class="form-control">
                <option value="air">Aéreo</option>
                <option value="land">Terrestre</option>
                <option value="sea">Marítimo</option>
            </select>
        </div>
        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="product" class="form-control" required>
        </div>
        <div class="form-group">
            <label>País de origen</label>
            <input type="text" name="country_origin" class="form-control" required>
        </div>
        <div class="form-group">
            <label>País de destino</label>
            <input type="text" name="country_destination" class="form-control" required>
        </div>
        <!-- <div class="form-group">
            <label>Documentos</label>
            <input type="file" name="documents[]" class="form-control" multiple>
        </div> -->
        <button type="submit" class="btn btn-primary mt-2">Crear Ticket</button>
    </form>
</div>
@endsection