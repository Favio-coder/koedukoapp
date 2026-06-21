-- Active: 1781930531053@@localhost@5432@appdb
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
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('c_rol')
                ->primary()
                ->default(DB::raw('gen_random_uuid()'));

            $table->string('l_rol', 100)
                ->unique();

            $table->text('l_desc')->nullable();

            $table->timestamp('f_crea')
                ->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
