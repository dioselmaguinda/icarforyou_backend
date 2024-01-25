<?php

use App\Models\Vehicle;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('vin');
            $table->string('color');
            $table->string('engine');
            $table->string('transmission');
            $table->string('date_of_sale');
            $table->timestamps();

            // Add foreign key for 'brand_id'
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('brand_id')->on('brands');

            // Add foreign key for 'model_id'
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('model_id')->on('models');

            // Add foreign key for 'option_id'
            $table->unsignedBigInteger('option_id');
            $table->foreign('option_id')->references('option_id')->on('options');

            // Add foreign key for 'dealer_id'
            $table->unsignedBigInteger('dealer_id');
            $table->foreign('dealer_id')->references('dealer_id')->on('dealers');

            // Add foreign key for 'customer_id'
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
