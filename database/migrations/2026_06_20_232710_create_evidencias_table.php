<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evidencias', function (Blueprint $table) {

            $table->uuid('c_evid')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_sesi');

            $table->string('l_evid', 200);

            $table->text('l_desc')
                ->nullable();

            $table->string('l_modo', 30)
                ->default('simple');

            $table->timestamp('f_apert');

            $table->timestamp('f_cierre');

            $table->boolean('q_calif')
                ->default(true);

            $table->boolean('q_publi')
                ->default(false);

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamps();

            $table->integer('n_orde')
                ->default(1);

            $table->integer('n_punt_max')
                ->nullable();

            $table->foreign('c_sesi')
                ->references('c_sesi')
                ->on('sesiones')
                ->cascadeOnDelete();

            $table->index('c_sesi');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evidencias');
    }
};