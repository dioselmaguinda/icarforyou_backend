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
        Schema::create('dealers', function (Blueprint $table) {
            $table->id('dealer_id');
            $table->string('name');
            $table->timestamps();

            // Add foreign key for 'brand_id'
            $table->unsignedBigInteger('inventory_id');
            $table->foreign('inventory_id')->references('inventory_id')->on('inventories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealers');
    }
};
