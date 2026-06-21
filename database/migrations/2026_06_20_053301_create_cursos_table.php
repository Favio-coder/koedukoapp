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
        Schema::create('cursos', function (Blueprint $table) {

            $table->uuid('c_curs')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->string('l_curs', 150);

            $table->text('l_desc')
                ->nullable();

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamp('f_crea')
                ->useCurrent();

            $table->unique('l_curs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
