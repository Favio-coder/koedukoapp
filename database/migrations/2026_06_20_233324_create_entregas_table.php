<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entregas', function (Blueprint $table) {

            $table->uuid('c_entr')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_evid');

            $table->uuid('c_usua');

            $table->integer('n_vers')
                ->default(1);

            $table->text('l_come')
                ->nullable();

            $table->timestamp('f_entr');

            $table->boolean('q_tarde')
                ->default(false);

            $table->boolean('q_actua')
                ->default(true);

            $table->boolean('q_activo')
                ->default(true);

            $table->string('l_estado', 30)
                ->default('entregado');
                
            $table->timestamps();

            $table->foreign('c_evid')
                ->references('c_evid')
                ->on('evidencias')
                ->cascadeOnDelete();

            $table->foreign('c_usua')
                ->references('c_usua')
                ->on('users')
                ->cascadeOnDelete();

            $table->index([
                'c_evid',
                'c_usua'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};