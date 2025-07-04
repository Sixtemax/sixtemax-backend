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

        Schema::create('cuenta_contables', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');              // Ej: 110505
            $table->string('nombre');              // Ej: Caja general
            $table->enum('tipo', ['activo', 'pasivo', 'patrimonio', 'ingreso', 'gasto', 'costo']);
            $table->enum('naturaleza', ['debito', 'credito']);
            $table->string('nivel')->nullable();   // Opcional para jerarquía tipo 1.1.1.1
            $table->foreignId('empresa_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('cuenta_contables');

    }

};

