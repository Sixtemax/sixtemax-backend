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

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia'); // Repetible o no, controlado por config
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 12, 2);
            $table->integer('stock')->default(0);
            $table->string('marca')->nullable();
            $table->string('imagen')->nullable(); // URL o nombre de archivo
            $table->boolean('activo')->default(true);
            $table->boolean('visible_en_tienda')->default(false); // para el e-commerce
            $table->timestamps();
        });


    }



    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('productos');

    }

};

