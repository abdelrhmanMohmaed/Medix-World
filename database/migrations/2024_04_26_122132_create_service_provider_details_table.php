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
        Schema::create('service_provider_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->foreignId('city_id')->constrained(); 
            $table->foreignId('region_id')->constrained(); 
            $table->foreignId('title_id')->constrained(); 
            $table->foreignId('major_id')->constrained(); 
            $table->json('name');
            $table->json('summary');
            $table->json('address');
            $table->float('price',8,2);
            $table->string('img');
            $table->string('medical_card');
            $table->enum('status',['Pending','Approval','Reject'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_details');
    }
};
