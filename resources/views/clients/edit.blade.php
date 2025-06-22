@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ isset($client) ? 'Modifier' : 'Ajouter' }} un client</h3>

        <form method="POST" action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}">
            @csrf
            @if(isset($client)) @method('PUT') @endif

            <label>Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $client->nom ?? '') }}" required>

            <button type="submit" class="btn btn-success mt-3">{{ isset($client) ? 'Mettre à jour' : 'Ajouter' }}</button>
        </form>
    </div>
@endsection