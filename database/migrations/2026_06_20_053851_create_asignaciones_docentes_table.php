<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asignaciones_docentes', function (Blueprint $table) {

            $table->uuid('c_asig')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_usua');

            $table->uuid('c_aulc');

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamp('f_crea')
                ->useCurrent();

            $table->foreign('c_usua')
                ->references('c_usua')
                ->on('users');

            $table->foreign('c_aulc')
                ->references('c_aulc')
                ->on('aula_cursos');

            // Un curso en un aula solo tiene un docente
            $table->unique('c_aulc');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignaciones_docentes');
    }
};