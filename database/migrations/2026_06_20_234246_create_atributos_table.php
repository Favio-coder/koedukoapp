<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atributos', function (Blueprint $table) {

            $table->uuid('c_atri')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_ie');

            $table->string('l_atri', 150);

            $table->text('l_desc')->nullable();

            $table->boolean('q_activo')->default(true);

            $table->timestamps();

            $table->foreign('c_ie')
                ->references('c_ie')
                ->on('instituciones')
                ->cascadeOnDelete();

            // ⚠️ IMPORTANTE: evita duplicados por institución
            $table->unique(['c_ie', 'l_atri']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atributos');
    }
};