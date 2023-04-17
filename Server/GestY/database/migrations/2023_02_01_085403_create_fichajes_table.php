<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained()->onDelete('cascade');
            $table->timestamp('entrada')->nullable()->default(null);
            $table->timestamp('salida')->nullable()->default(null);
            $table->integer('time')->default(0);
            $table->string('ip', 20)->nullable()->default(null);
            $table->string('terminal',20)->nullable()->default(null);
            $table->string('script', 255)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichajes');
    }
};
