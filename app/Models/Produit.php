<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commandes;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ["nomProd","prixUnitaireHT", "couleur",  "prixTTC"];

    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commandes::class, 'cmd_prod',"idProd" , 'cmd_id' );
        
    }

 

}
