@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Historique des Bons - {{ $client->nom }}</h3>

        @foreach ($bons as $bon)
            <div class="card mt-3">
                <div class="card-header">
                    <strong>Bon N°{{ $bon->numero }}</strong> | Type: {{ ucfirst($bon->type) }} | Date: {{ $bon->date }}
                    <a href="{{ route('bons.pdf', $bon->id) }}" class="btn btn-sm btn-secondary float-end">🖨️ PDF</a>
                </div>
                <div class="card-body">
                    <p><strong>Travaux :</strong> {{ $bon->travaux_effectues }}</p>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Désignation</th>
                                <th>N° Série</th>
                                <th>Redevance</th>
                                <th>Ancien</th>
                                <th>Nouveau</th>
                                <th>Qté</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bon->lignes as $ligne)
                                <tr>
                                    <td>{{ $ligne->designation }}</td>
                                    <td>{{ $ligne->numero_serie }}</td>
                                    <td>{{ $ligne->redevance }}</td>
                                    <td>{{ $ligne->ancien_cpt }}</td>
                                    <td>{{ $ligne->nouveau_cpt }}</td>
                                    <td>{{ $ligne->quantite }}</td>
                                    <td>{{ $ligne->prix_unitaire }}</td>
                                    <td>{{ $ligne->total_ht }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection