<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {

            $table->uuid('c_unid')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_aulc');

            $table->uuid('c_peri');

            $table->string('l_unid', 200);

            $table->text('l_desc')
                ->nullable();

            $table->integer('n_orden');

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamps();

            $table->foreign('c_aulc')
                ->references('c_aulc')
                ->on('aula_cursos')
                ->cascadeOnDelete();

            $table->foreign('c_peri')
                ->references('c_peri')
                ->on('periodos_academicos')
                ->cascadeOnDelete();

            $table->unique([
                'c_aulc',
                'c_peri',
                'n_orden'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};