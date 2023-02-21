<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::all();
       
        return view("commande.index", compact("commandes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Produit::all();
        return view("commande.create",  compact( "products"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->produits);
        $this->validate($request, [
            "dateCommande" =>"required",
            "moyenPaiement" => "required",
            "totalCommande" =>"required",
            "paiementValid" => "required"
        ]);
        $commandes = Commande::create([
            "dateCommande" => $request->dateCommande,
            "moyenPaiement" => $request->moyenPaiement,
            "totalCommande" => $request->totalCommande,
            "paiementValid" => (bool) $request->paiementValid
        ]);

        $commandes->produits->attach($request->produits);
        return  redirect()->back()->with("success", "commande created successfuly");
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        return view("commande.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
