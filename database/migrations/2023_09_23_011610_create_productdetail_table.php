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
        Schema::create('productdetail', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cost')->nullable();
            $table->integer('isDeleted')->default(1);
            $table->string('warranty');
            $table->string('discount');
            $table->string('new');
            $table->string('ha_sp');
            $table->string('status');
            $table->string('featured');
            $table->string('quanlity');
            $table->string('details');

            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references("id")->on("product");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productdetail');
    }
};
