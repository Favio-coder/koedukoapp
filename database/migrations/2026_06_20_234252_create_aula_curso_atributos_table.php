<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aula_curso_atributos', function (Blueprint $table) {

            $table->uuid('c_acat')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_aulc');

            $table->uuid('c_atri');

            $table->decimal('s_peso', 5, 2);

            $table->integer('n_orde')->default(1);

            $table->boolean('q_activo')->default(true);

            $table->timestamps();

            $table->foreign('c_aulc')
                ->references('c_aulc')
                ->on('aula_cursos')
                ->cascadeOnDelete();

            $table->foreign('c_atri')
                ->references('c_atri')
                ->on('atributos')
                ->restrictOnDelete();

            // evita duplicar atributo en el mismo curso
            $table->unique(['c_aulc', 'c_atri']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aula_curso_atributos');
    }
};