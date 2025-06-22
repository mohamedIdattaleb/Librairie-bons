@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tableau de bord</h2>

        <div class="row mt-4">
            <div class="col-md-4">
                <a href="{{ route('clients.index') }}" class="btn btn-primary btn-block">👤 Gérer les Clients</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('bons.index') }}" class="btn btn-success btn-block">📦 Gérer les Bons</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('bons.create') }}" class="btn btn-info btn-block">➕ Ajouter un Bon</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <form action="{{ route('bons.search') }}" method="GET">
                    <label for="search">🔎 Rechercher un client :</label>
                    <input type="text" name="q" class="form-control" placeholder="Nom du client...">
                </form>
            </div>
        </div>
    </div>
@endsection