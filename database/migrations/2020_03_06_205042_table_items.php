<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('collection_id')->references('id')->on('itemcollections')->onDelete('cascade');
           // $table->integer('collection_id')->unsigned()->change();
           // $table->integer('collection_id')->change();
           // $table->foreign('collection_id')->references('id')->on('collections')->onDelete("NO ACTION");
            //$table->foreign('collection_id')->references('id')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
