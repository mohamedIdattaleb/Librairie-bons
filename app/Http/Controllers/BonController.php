<?php

namespace App\Http\Controllers;

use App\Models\Bon;
use App\Models\Client;
use App\Models\LigneBon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('bons.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bon = Bon::create([
            'numero' => $request->numero,
            'type' => $request->type,
            'date' => $request->date,
            'client_id' => $request->client_id,
            'travaux_effectues' => $request->travaux_effectues
        ]);

        foreach ($request->designation as $index => $val) {
            LigneBon::create([
                'bon_id' => $bon->id,
                'designation' => $val,
                'numero_serie' => $request->numero_serie[$index],
                'redevance' => $request->redevance[$index],
                'ancien_cpt' => $request->ancien_cpt[$index],
                'nouveau_cpt' => $request->nouveau_cpt[$index],
                'quantite' => $request->quantite[$index],
                'prix_unitaire' => $request->prix_unitaire[$index],
                'total_ht' => $request->quantite[$index] * $request->prix_unitaire[$index],
            ]);
        }
        return redirect()->route('bons.index');
    }

    public function downloadPDF($id)
    {
        $bon = Bon::with('client', 'lignes')->findOrFail($id);
        $pdf = Pdf::loadView('bons.pdf', compact('bon'));
        return $pdf->download("Bon_{$bon->numero}.pdf");
    }

    public function search(Request $request)
    {
        $q = $request->input('q');

        // Chercher un client
        $client = Client::where('nom', 'like', '%' . $q . '%')->first();

        if (!$client) {
            return back()->with('error', 'Client introuvable.');
        }

        $bons = Bon::with('lignes')->where('client_id', $client->id)->orderByDesc('date')->get();

        return view('bons.historique', compact('client', 'bons'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
