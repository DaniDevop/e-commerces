<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fournisseur extends Model
{
    use HasFactory;

    //ici le produit est dominer donc il est toujour HasMany
    public function produit():HasMany //le dominer
    {
        return $this->hasMany(Produit::class);
    }
}
