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
        Schema::create('users', function (Blueprint $table) {

            $table->uuid('c_usua')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->uuid('c_ie');

            $table->uuid('c_rol');

            $table->string('l_email', 255)
                ->unique();

            $table->string('l_nom', 100);

            $table->string('l_apep', 100);

            $table->string('l_apem', 100)
                ->nullable();

            $table->date('f_naci')
                ->nullable();

            $table->boolean('q_activo')
                ->default(true);

            // Laravel Auth
            $table->timestamp('email_verified_at')
                ->nullable();

            $table->string('password');

            $table->rememberToken();

            // Auditoría
            $table->timestamp('f_crea')
                ->useCurrent();

            $table->foreign('c_ie')
                ->references('c_ie')
                ->on('instituciones');

            $table->foreign('c_rol')
                ->references('c_rol')
                ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
