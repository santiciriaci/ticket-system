@extends('layouts.app')

@section('content')
<div class="container">
@if(auth()->user()->unreadNotifications->count())
    <div class="notifications">
        @foreach(auth()->user()->unreadNotifications as $notification)
            <div class="notification">
                <p>{{ $notification->data['message'] }}</p>
            </div>
        @endforeach
    </div>
@endif
    <h1>Mis Tickets</h1>
    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Nuevo Ticket</a>

    @if($tickets->isEmpty())
    <p>No tenés tickets aún.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Modo</th>
                <th>Producto</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Estado</th>
                <th>Creador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->name }}</td>
                <td>{{ $ticket->type }}</td>
                <td>{{ $ticket->transport_mode }}</td>
                <td>{{ $ticket->product }}</td>
                <td>{{ $ticket->country_origin }}</td>
                <td>{{ $ticket->country_destination }}</td>
                <td>{{ $ticket->status }}</td>
                <td>{{ $ticket->user_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection