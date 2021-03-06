<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use App\Fournisseur;
use App\Trace;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices.index', ['fournisseurs' => Fournisseur::all(), 'invoices' => Invoice::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create')->with('fournisseurs', Fournisseur::getAllFournisseur());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_ajout' => 'required|date',
            'fournisseur_id' => 'required',
            'numero_facture' => 'required',
            'date_facture' => 'required|date',
            'montant' => 'required|numeric',
            'date_reglement' => 'nullable',
            'commentaire' => 'nullable'
        ]);
        Invoice::create($request->except('_token'));
        Trace::traceCreate('Invoice', $request);
        \Session::flash('success', 'La facture a bien été créée!');
        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', ['fournisseurs' => Fournisseur::getAllFournisseur(), 'invoice' => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'date_ajout' => 'required|date',
            'fournisseur_id' => 'required',
            'numero_facture' => 'required',
            'date_facture' => 'required|date',
            'montant' => 'required|numeric',
            'date_reglement' => 'nullable',
            'commentaire' => 'nullable'
        ]);
        $befInvoice = clone $invoice;
        $invoice->date_ajout = $request->get('date_ajout');
        $invoice->fournisseur_id = $request->get('fournisseur_id');
        $invoice->numero_facture = $request->get('numero_facture');
        $invoice->date_facture = $request->get('date_facture');
        $invoice->montant = $request->get('montant');
        $invoice->date_reglement = $request->get('date_reglement');
        $invoice->commentaire = $request->get('commentaire');
        $invoice->save();
        Trace::traceUpdate('Invoice', $request, $befInvoice);
        \Session::flash('success', 'La facture a bien été modifiée!');
        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        Trace::traceDelete('Invoice', $invoice);
        \Session::flash('success', 'La facture a bien été supprimée!');
        return redirect()->route('invoices.index');
    }
}
