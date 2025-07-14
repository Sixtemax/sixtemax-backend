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

        Schema::create('empresas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('nit')->unique();
        $table->string('telefono')->nullable();
        $table->string('email')->nullable();
        $table->string('direccion')->nullable();
        $table->string('ciudad')->nullable();
        $table->string('logo')->nullable(); // Si quieres mostrarlo en PDFs
        $table->text('notas_factura')->nullable(); 
        $table->boolean('activo')->default(true);// Para pie de factura
        $table->timestamps();
});


    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('empresas');

    }

};

