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
        Schema::create('hash', function (Blueprint $table) {
            $table->timestamp('Batch')->useCurrent();
            $table->integer('Block')->autoIncrement();
            $table->string('String', 255);
            $table->string('Key', 8);
            $table->string('Hash', 255);
            $table->integer('times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hash');
    }
};
