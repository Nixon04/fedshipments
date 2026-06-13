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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code')->unique(); 
            $table->string('title')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('receiver_name')->nullable();

            $table->string('origin')->nullable(); // Lagos Warehouse
            $table->string('destination')->nullable(); // Abuja

            $table->enum('status', [
                'pending',
                'picked_up',
                'in_transit',
                'arrived',
                'out_for_delivery',
                'delivered'
            ])->default('pending');

            $table->decimal('progress', 5, 2)->default(0); // 65%

            $table->timestamp('expected_delivery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
