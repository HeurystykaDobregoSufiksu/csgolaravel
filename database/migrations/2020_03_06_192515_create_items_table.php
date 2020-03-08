<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('weapon_name');
            $table->string('skin_name');
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->enum('rarity', ['Consumer Grade', 'Industrial Grade', 'Mil-Spec', 'Restricted', 'Classified', 'Covert', 'gold', 'contraband'])->nullable();
            //$table->string('rarity')->nullable();
            $table->integer('gameID')->nullable();
            $table->float('minWear')->nullable();
            $table->float('maxWear')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('items');
    }
}
