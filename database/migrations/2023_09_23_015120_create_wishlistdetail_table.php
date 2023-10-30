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
        Schema::create('wishlistdetail', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('product_id')->unsigned();
        $table->unsignedBigInteger('wishlist_id')->unsigned();

        $table->foreign('product_id')->references("id")->on("product");
        $table->foreign('wishlist_id')->references("id")->on("wishlist");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlistdetail');
    }
};
