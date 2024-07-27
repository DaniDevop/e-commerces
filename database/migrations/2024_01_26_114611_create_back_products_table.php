<?php

use App\Models\detail_commande;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('back_products', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->integer('qte_retourner');
            $table->foreignIdFor(detail_commande::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('back_products');
    }
};
