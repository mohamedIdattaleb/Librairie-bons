@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer un Bon</h2>

        <form method="POST" action="{{ route('bons.store') }}">
            @csrf

            <label>Client :</label>
            <select name="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                @endforeach
            </select>

            <label>Type :</label>
            <select name="type" class="form-control">
                <option value="livraison">Livraison</option>
                <option value="intervention">Intervention</option>
                <option value="releve">Relevé Compteur</option>
            </select>

            <label>Numéro :</label>
            <input type="text" name="numero" class="form-control" required>

            <label>Date :</label>
            <input type="date" name="date" class="form-control" required>

            <label>Travaux effectués :</label>
            <textarea name="travaux_effectues" class="form-control"></textarea>

            <hr>
            <h4>Lignes du Bon</h4>

            <div id="lignes">
                <div class="ligne row mb-2">
                    <input type="text" name="designation[]" class="form-control col" placeholder="Désignation">
                    <input type="text" name="numero_serie[]" class="form-control col" placeholder="N° Série">
                    <input type="text" name="redevance[]" class="form-control col" placeholder="Redevance">
                    <input type="number" name="ancien_cpt[]" class="form-control col" placeholder="Ancien">
                    <input type="number" name="nouveau_cpt[]" class="form-control col" placeholder="Nouveau">
                    <input type="number" name="quantite[]" class="form-control col" placeholder="Quantité">
                    <input type="number" name="prix_unitaire[]" class="form-control col" placeholder="Prix Unitaire">
                    <button type="button" class="btn btn-danger btn-sm col-auto remove">✖</button>
                </div>
            </div>

            <button type="button" class="btn btn-secondary" id="addRow">➕ Ajouter une ligne</button>

            <br><br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <script>
        document.getElementById('addRow').addEventListener('click', function () {
            const lignes = document.getElementById('lignes');
            const clone = lignes.firstElementChild.cloneNode(true);
            clone.querySelectorAll('input').forEach(input => input.value = '');
            lignes.appendChild(clone);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove') && document.querySelectorAll('.ligne').length > 1) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endsection