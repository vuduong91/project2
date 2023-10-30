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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_sp')->nullable();
            $table->string('PTTT')->nullable();
            $table->string('cost')->nullable();
            $table->string('address')->nullable();  

            $table->unsignedBigInteger('checkout_id')->unsigned();
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->unsignedBigInteger('shipping_id')->unsigned();
            $table->integer('isDeleted')->default(1);   
            
            $table->foreign('checkout_id')->references("id")->on("checkout");
            $table->foreign('client_id')->references("id")->on("client");
            $table->foreign('shipping_id')->references("id")->on("shipping");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
