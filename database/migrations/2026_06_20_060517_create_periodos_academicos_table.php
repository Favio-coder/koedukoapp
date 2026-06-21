<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periodos_academicos', function (Blueprint $table) {

            $table->uuid('c_peri')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_ie');

            $table->string('l_peri', 150);

            $table->date('f_inicio');
            $table->date('f_fin');

            $table->integer('n_orden');

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamps();

            $table->foreign('c_ie')
                ->references('c_ie')
                ->on('instituciones')
                ->cascadeOnDelete();

            $table->unique(['c_ie', 'n_orden']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periodos_academicos');
    }
};