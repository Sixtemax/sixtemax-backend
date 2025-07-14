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

        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas')->cascadeOnDelete(); // o permitido_id si es el caso
            $table->string('numero_factura')->nullable(); // generado al enviar a DIAN
            $table->date('fecha');
            $table->enum('estado', ['pendiente', 'enviada', 'rechazada'])->default('pendiente');
            $table->text('respuesta_dian')->nullable();
            $table->timestamps();
        });


    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('facturas');

    }

};

