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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191)->nullable();
            $table->integer('price');
            $table->string('sale_price');
            $table->integer('quantity');
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('categories');
            $table->string('details');
            $table->string('feature_image');
            $table->integer('status')->default(0,1);
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
        Schema::dropIfExists('products');
    }
};
