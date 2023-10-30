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
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_sp')->nullable();
            $table->string('cost')->nullable();
            $table->string('address')->nullable();
            $table->string('PTTT')->nullable();
            $table->string('name_user')->nullable();
            $table->integer('isDeleted')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
