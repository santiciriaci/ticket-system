@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Tickets</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asunto</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->user }}</td>
                    <td>
                        <form action="{{ route('agent.tickets.update', $ticket->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="status" class="form-control">
                                <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Abierto</option>
                                <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>En progreso</option>
                                <option value="completed" {{ $ticket->status == 'completed' ? 'selected' : '' }}>Cerrado</option>
                            </select>

                            <button type="submit" class="btn btn-primary mt-2">Actualizar Estado</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
