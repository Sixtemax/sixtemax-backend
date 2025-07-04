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

        Schema::create('movimiento_inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('almacen_origen_id')->nullable()->constrained('almacens')->onDelete('set null');
            $table->foreignId('almacen_destino_id')->nullable()->constrained('almacens')->onDelete('set null');
            $table->string('tipo'); // entrada, salida, traslado, devolucion_interna, ajuste
            $table->text('observaciones')->nullable();
            $table->date('fecha');
            $table->timestamps();
        });

    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('movimiento_inventarios');

    }

};

