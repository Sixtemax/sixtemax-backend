<?php



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

        Schema::create('metodo_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  // Ej: Efectivo, Nequi, Bancolombia, etc.
            $table->foreignId('cuenta_contable_id')->nullable()->constrained()->onDelete('set null');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('metodo_pagos');

    }

};

