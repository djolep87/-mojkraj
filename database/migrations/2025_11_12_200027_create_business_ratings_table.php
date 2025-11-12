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
        Schema::create('business_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_user_id')->constrained('business_users')->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned()->comment('Rating from 1 to 5');
            $table->string('review', 200)->nullable()->comment('Review text up to 200 characters');
            $table->string('emoji', 10)->nullable()->comment('Emoji reaction: 😀, 😐, 😞');
            $table->integer('helpful_count')->default(0);
            $table->timestamps();
            
            // Ensure one rating per user per business
            $table->unique(['user_id', 'business_user_id']);
            
            // Indexes for better performance
            $table->index('business_user_id');
            $table->index('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_ratings');
    }
};
