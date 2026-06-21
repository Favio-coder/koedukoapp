<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recursos', function (Blueprint $table) {

            $table->uuid('c_recu')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->string('l_nomb', 255);

            $table->string('l_orig', 255);

            $table->string('l_prov', 50)
                ->default('local');

            $table->text('l_ruta');

            $table->string('l_mime', 150);

            $table->bigInteger('n_bytes')
                ->default(0);

            $table->uuid('c_owne');

            $table->string('l_owne', 50);

            $table->boolean('q_activo')
                ->default(true);

            $table->string('l_hash', 64)
                ->nullable();

            $table->timestamps();

            $table->index([
                'c_owne',
                'l_owne'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};