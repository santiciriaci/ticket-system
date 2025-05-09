<form action="{{ route('tickets.upload', $ticket->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="document">Subir documento:</label>
    <input type="file" name="document" required>
    <button type="submit">Subir</button>
</form>

<ul>
    @foreach ($ticket->documents as $doc)
        <li><a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">Ver documento</a></li>
    @endforeach
</ul>
