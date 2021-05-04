<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uf', function (Blueprint $table) {
            $table->id();
            $table->string('initials', 2)->nullable(false)->unique();
            $table->string('name', 100)->nullable(false)->unique();
            $table->foreignId('country_region_id');
            $table->timestamps();


            $table->foreign('country_region_id')
                    ->references('id')
                    ->on('country_region')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uf');
    }
}
