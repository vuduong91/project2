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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('namesp')->nullable();
            $table->string('cost')->nullable();
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->integer('isDeleted')->default(1);

            $table->foreign('client_id')->references("id")->on("client");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
