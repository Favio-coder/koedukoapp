<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluaciones', function (Blueprint $table) {

            $table->uuid('c_eval')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_entr');

            $table->uuid('c_usua');

            $table->integer('n_vers')
                ->default(1);

            $table->text('l_retro')
                ->nullable();

            $table->boolean('q_actua')
                ->default(true);

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamp('f_eval');

            $table->timestamps();

            $table->foreign('c_entr')
                ->references('c_entr')
                ->on('entregas')
                ->cascadeOnDelete();

            $table->foreign('c_usua')
                ->references('c_usua')
                ->on('users')
                ->cascadeOnDelete();

            $table->index('c_entr');
            $table->index('c_usua');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
