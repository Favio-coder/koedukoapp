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
        Schema::create('matriculas', function (Blueprint $table) {

            $table->uuid('c_matr')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_usua');

            $table->uuid('c_aula');

            $table->integer('n_anio');

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamp('f_crea')
                ->useCurrent();

            $table->foreign('c_usua')
                ->references('c_usua')
                ->on('users');

            $table->foreign('c_aula')
                ->references('c_aula')
                ->on('aulas');

            $table->unique([
                'c_usua',
                'n_anio'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
