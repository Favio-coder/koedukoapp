<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluacion_detalles', function (Blueprint $table) {

            $table->uuid('c_edet')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_eval');

            $table->uuid('c_crie');

            $table->decimal('s_valo', 10, 2);

            $table->text('l_obse')
                ->nullable();

            $table->timestamps();

            $table->foreign('c_eval')
                ->references('c_eval')
                ->on('evaluaciones')
                ->cascadeOnDelete();

            $table->foreign('c_crie')
                ->references('c_crie')
                ->on('criterios_evidencia')
                ->restrictOnDelete();

            $table->unique([
                'c_eval',
                'c_crie'
            ]);

            $table->index('c_eval');
            $table->index('c_crie');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluacion_detalles');
    }
};