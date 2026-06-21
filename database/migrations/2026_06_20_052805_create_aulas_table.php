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
        Schema::create('aulas', function (Blueprint $table) {

            $table->uuid('c_aula')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_grad');

            $table->uuid('c_tutor')
                ->nullable();

            $table->string('l_aula', 100);

            $table->text('l_desc')
                ->nullable();

            $table->boolean('q_activo')
                ->default(true);

            $table->timestamp('f_crea')
                ->useCurrent();

            $table->foreign('c_grad')
                ->references('c_grad')
                ->on('grados');

            $table->foreign('c_tutor')
                ->references('c_usua')
                ->on('users');

            $table->unique([
                'c_grad',
                'l_aula'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
