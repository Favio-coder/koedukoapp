<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('criterios_evidencia', function (Blueprint $table) {

            $table->uuid('c_crie')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_evid');

            $table->uuid('c_atri');

            $table->decimal('s_peso', 5, 2);

            $table->integer('n_orde')
                ->default(1);

            $table->text('l_desc')
                ->nullable();

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamps();

            $table->foreign('c_evid')
                ->references('c_evid')
                ->on('evidencias')
                ->cascadeOnDelete();

            $table->foreign('c_atri')
                ->references('c_atri')
                ->on('atributos')
                ->restrictOnDelete();

            $table->unique([
                'c_evid',
                'c_atri'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('criterios_evidencia');
    }
};