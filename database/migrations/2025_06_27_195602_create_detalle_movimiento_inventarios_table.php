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

        Schema::create('detalle_movimiento_inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movimiento_inventario_id')->constrained()->onDelete('cascade');
            $table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('costo_unitario', 15, 2)->nullable();
            $table->timestamps();
        });

    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('detalle_movimiento_inventarios');

    }

};

