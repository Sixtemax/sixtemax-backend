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

Schema::create('terceros', function (Blueprint $table) {
    $table->id();
    $table->string('tipo_documento')->nullable(); // CC, NIT, CE
    $table->string('documento')->unique();
    $table->string('nombre');
    $table->string('telefono')->nullable();
    $table->string('email')->nullable();
    $table->string('direccion')->nullable();
    $table->string('ciudad')->nullable();
    $table->enum('tipo', ['cliente', 'proveedor', 'ambos'])->default('cliente');
    $table->boolean('activo')->default(true); // ← esta línea es nueva
    $table->foreignId('empresa_id')->nullable()->constrained('empresas')->nullOnDelete();
    $table->timestamps();
});


    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('terceros');

    }

};

