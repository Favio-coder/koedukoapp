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
        Schema::create('invitaciones', function (Blueprint $table) {

            $table->uuid('c_invi')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_ie');

            $table->uuid('c_rol');

            $table->string('l_email', 255);

            $table->string('l_codigo_hash', 255);

            $table->timestamp('f_expira');

            $table->boolean('q_usado')
                ->default(false);
            
            $table->smallInteger('n_intentos')
                ->default(0);

            $table->timestamp('f_crea')
                ->useCurrent();
            
            $table->timestamp('f_ultimo_envio')
                ->nullable();

            $table->foreign('c_ie')
                ->references('c_ie')
                ->on('instituciones');

            $table->foreign('c_rol')
                ->references('c_rol')
                ->on('roles');

            $table->unique([
                'c_ie',
                'l_email'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitaciones');
    }
};
