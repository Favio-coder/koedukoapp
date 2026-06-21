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
        Schema::create('aula_cursos', function (Blueprint $table) {

            $table->uuid('c_aulc')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_aula');

            $table->uuid('c_curs');

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamp('f_crea')
                ->useCurrent();

            $table->foreign('c_aula')
                ->references('c_aula')
                ->on('aulas');

            $table->foreign('c_curs')
                ->references('c_curs')
                ->on('cursos');

            $table->unique([
                'c_aula',
                'c_curs'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aula_cursos');
    }
};
