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
        Schema::create('business_rating_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_rating_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_user_id')->constrained('business_users')->onDelete('cascade');
            $table->text('reply');
            $table->timestamps();
            
            // Ensure one reply per rating
            $table->unique('business_rating_id');
            
            // Indexes for better performance
            $table->index('business_rating_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_rating_replies');
    }
};
