<?php

namespace App\Models\User;

use App\Models\detail_commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    use HasFactory;


    public function detail_commande():HasMany{//dominant    
        return $this->hasMany(detail_commande::class); 

    }

    public function factures():HasMany{//dominant    
        return $this->hasMany(Facture::class); 

    }
    public function client():BelongsTo{//dominant    
        return $this->belongsTo(Client::class); 

    }
}
