<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad')->default(0);
            $table->timestamps();

            $table->unique(['empresa_id', 'producto_id', 'almacen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};