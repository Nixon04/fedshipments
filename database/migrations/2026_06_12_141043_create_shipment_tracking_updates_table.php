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
        Schema::create('shipment_tracking_updates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('shipment_id')->constrained()->onDelete('cascade');
        
            $table->string('location'); // "Benin Express Route"
            $table->string('description'); // "Package received at hub"
        
            $table->enum('status', [
                'picked_up',
                'in_transit',
                'checkpoint',
                'arrived',
                'out_for_delivery',
                'delivered'
            ])->nullable();
        
            $table->boolean('is_current')->default(false); // live indicator
        
            $table->timestamp('event_time')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_tracking_updates');
    }
};
