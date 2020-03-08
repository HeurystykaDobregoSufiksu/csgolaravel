<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsWearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_wears', function (Blueprint $table) {
            $table->id();
            $table->string('market_hash_name');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('skin_id')->nullable();
            $table->float('steamPrice');
            $table->float('bitskinsPrice');
            $table->text('steamLink')->nullable();
            $table->float('wearMin')->nullable();

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
        Schema::dropIfExists('items_wear');
    }
}
