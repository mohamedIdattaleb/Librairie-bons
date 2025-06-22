@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Liste des clients</h3>
        <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">➕ Nouveau client</a>

        @foreach ($clients as $client)
            <div class="d-flex justify-content-between align-items-center border p-2 mb-2">
                <div>{{ $client->nom }}</div>
                <div>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">✏️ Modifier</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce client ?')">🗑️</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection