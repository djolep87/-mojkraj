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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('offer_type'); // dnevna_ponuda, specijalna_ponuda, akcija, itd.
            $table->decimal('original_price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->string('discount_percentage')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();
            $table->time('valid_time_from')->nullable();
            $table->time('valid_time_until')->nullable();
            $table->json('images')->nullable();
            $table->string('category')->default('opšte'); // hrana, usluge, proizvodi, itd.
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
