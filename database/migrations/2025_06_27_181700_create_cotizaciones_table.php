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

        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tercero_id')->constrained('terceros')->cascadeOnDelete();
            $table->date('fecha');
            $table->enum('estado', ['pendiente', 'convertida', 'anulada'])->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });


    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('cotizaciones');

    }

};

