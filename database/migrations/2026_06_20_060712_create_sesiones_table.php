<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sesiones', function (Blueprint $table) {

            $table->uuid('c_sesi')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_unid');

            $table->string('l_sesi', 200);

            $table->text('l_desc')
                ->nullable();

            $table->text('l_obje')
                ->nullable();

            $table->date('f_sesi');

            $table->integer('n_orde');

            $table->integer('n_dura')
                ->default(45);

            $table->string('l_estado', 20)
                ->default('borrador');

            // $table->enum(
            //         "l_estado IN (
            //             'borrador',
            //             'programada',
            //             'publicada',
            //             'cerrada'
            //         )"
            //     )->default('borrador');

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamps();

            $table->foreign('c_unid')
                ->references('c_unid')
                ->on('unidades')
                ->cascadeOnDelete();

            $table->unique([
                'c_unid',
                'n_orde'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sesiones');
    }
};