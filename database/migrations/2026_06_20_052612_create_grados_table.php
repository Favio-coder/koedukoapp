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
        Schema::create('grados', function (Blueprint $table) {

        $table->uuid('c_grad')
            ->primary()
            ->default(DB::raw('gen_random_uuid()'));

        $table->uuid('c_ie');

        $table->string('l_grad', 100);

        $table->text('l_desc')
            ->nullable();

        $table->smallInteger('n_orden');

        $table->boolean('q_activo')
            ->default(true);

        $table->timestamp('f_crea')
            ->useCurrent();

        $table->foreign('c_ie')
            ->references('c_ie')
            ->on('instituciones');

        $table->unique([
            'c_ie',
            'l_grad'
        ]);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grados');
    }
};
