<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instituciones', function (Blueprint $table) {

            $table->uuid('c_ie')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->string('l_nombre', 255);

            $table->string('l_codigo_modular', 50)
                ->nullable();

            $table->string('l_nivel', 100)
                ->nullable();

            $table->string('l_direccion', 255)
                ->nullable();

            $table->string('l_telefono', 50)
                ->nullable();

            $table->string('l_email', 255)
                ->nullable();

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamp('f_crea')
                ->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instituciones');
    }
};
