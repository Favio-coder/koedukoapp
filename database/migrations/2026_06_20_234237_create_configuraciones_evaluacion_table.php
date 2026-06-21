<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('configuraciones_evaluacion', function (Blueprint $table) {

            $table->uuid('c_conf')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_ie');

            $table->string('l_nomb', 150);

            $table->string('l_tipo', 50);

            $table->decimal('s_min', 10, 2)->nullable();
            $table->decimal('s_max', 10, 2)->nullable();
            $table->decimal('s_apro', 10, 2)->nullable();

            $table->json('j_esca')->nullable();

            $table->boolean('q_activo')->default(true);

            $table->timestamps();

            $table->foreign('c_ie')
                ->references('c_ie')
                ->on('instituciones')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('configuraciones_evaluacion');
    }
};