<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
class Commande extends Model
{
    use HasFactory;
    protected $fillable = ["dateCommande","moyenPaiement", "totalCommande",  "paiementValid"];


     
    public function produits() 
    {
        // in this place display error because he cant find Unknown column produit_id
        return $this->belongsToMany(Produit::class, 'cmd_prod', "prod_id");
        
    }
 
 /**
  * The roles that belong to the Commande
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
  */
 
}
