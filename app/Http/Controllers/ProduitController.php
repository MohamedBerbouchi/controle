<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $produits = Produit::all();
    
      return view("produit.index", compact("produits"));
    }

     
    public function create()
    {

        return view("produit.create");
    }

    public function store(Request $request)
    {
        define('TVA', 0.2);
        $this->validate($request, [
            "nomProd" =>"required",
            "prixUnitaireHT" => "required",
            "couleur" =>"required",
            
        ]);
        $prixTTC = $request->prixUnitaireHT + ($request->prixUnitaireHT * TVA);
        
        $commandes = Produit::create([
            "nomProd" => $request->nomProd,
            "prixUnitaireHT" => $request->prixUnitaireHT,
            "couleur" => $request->couleur,
            "prixTTC" => $prixTTC
        ]);
        return  redirect()->route('produits')->with("success", "product created successfuly");
    }

 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $produit = Produit::find($id);
        $produit = DB::table('produits')->where('idProd', $id)->first();
         return view("produit.edit")->with("produit", $produit);
    }

  
    public function update(Request $request, $id)
    {
        define('TVA', 0.2);

        $this->validate($request, [
            "nomProd" =>"required",
            "prixUnitaireHT" => "required",
            "couleur" =>"required",
  
        ]);
        $produit = DB::table('produits')->where('idProd', $id);
        $produit->update([
        
                "nomProd" => $request->nomProd,
                "prixUnitaireHT" => $request->prixUnitaireHT,
                "couleur" => $request->couleur,
                "prixTTC" => $request->prixUnitaireHT + ($request->prixUnitaireHT * TVA)
          
            ]);
     
        return  redirect()->route('produits')->with("success", "product updated successfuly");
        
    }

  
    public function destroy($id)
    {
        
        
        DB::table('produits')->where('idProd', $id)->delete();

         
        return  redirect()->back()->with("success", "product deleted successfuly");

    }
}
