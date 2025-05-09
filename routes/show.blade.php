<h4>Subir documento</h4>
<form method="POST" action="{{ route('ticket_documents.store', $ticket->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Archivo</label>
        <input type="file" name="document" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Descripción (opcional)</label>
        <input type="text" name="description" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Subir</button>
</form>

{{-- Mostrar documentos existentes --}}
<h5 class="mt-4">Documentos adjuntos</h5>
<ul>
@foreach($ticket->documents as $doc)
    <li>
        <a href="{{ Storage::url($doc->file_path) }}" target="_blank">Ver documento</a>
        @if($doc->description)
            - {{ $doc->description }}
        @endif
    </li>
@endforeach
</ul>
