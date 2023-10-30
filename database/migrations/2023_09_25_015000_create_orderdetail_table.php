<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('product_id')->unsigned();
         $table->unsignedBigInteger('order_id')->unsigned();
         $table->string('cost')->nullable();
         $table->string('quanlity')->nullable();

         $table->primary(['product_id', 'order_id']);

         $table->foreign('product_id')->references("id")->on("product");
         $table->foreign('order_id')->references("id")->on("orders");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetail');
    }
};
