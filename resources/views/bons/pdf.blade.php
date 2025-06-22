<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 4px;
        }
    </style>
</head>

<body>
    <h2>Librairie Papeterie IBTISSAM</h2>
    <p>Bon : {{ strtoupper($bon->type) }} | N° {{ $bon->numero }} | Date : {{ $bon->date }}</p>
    <p><strong>Client :</strong> {{ $bon->client->nom }}</p>

    <table width="100%">
        <thead>
            <tr>
                <th>Désignation</th>
                <th>N° Série</th>
                <th>Redevance</th>
                <th>Ancien</th>
                <th>Nouveau</th>
                <th>Qté</th>
                <th>Prix Unitaire</th>
                <th>Total HT</th>
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

    <br>
    <p><strong>Travaux effectués :</strong></p>
    <p>{{ $bon->travaux_effectues }}</p>

    <br><br>
    <table width="100%">
        <tr>
            <td><strong>Signature Client</strong></td>
            <td><strong>Signature Librairie</strong></td>
        </tr>
    </table>
</body>

</html>