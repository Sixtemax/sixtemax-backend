<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacensTable extends Migration
{
    public function up()
    {
        Schema::create('almacens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('sucursal_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nombre');
            $table->enum('tipo', ['almacen', 'bodega', 'punto_venta'])->default('almacen');
            $table->string('ubicacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacens');
    }
}

