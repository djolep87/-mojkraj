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
        Schema::create('pets_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('pet_type')->nullable(); // pas, mačka, ptica, itd.
            $table->string('pet_breed')->nullable(); // rasa
            $table->string('pet_age')->nullable(); // starost
            $table->string('pet_gender')->nullable(); // pol
            $table->string('post_type'); // upit, informacija, prodaja, usluga, itd.
            $table->string('location')->nullable(); // lokacija gde se traži/pruža usluga
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->json('images')->nullable(); // array slika
            $table->json('videos')->nullable(); // array videa
            $table->boolean('is_urgent')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets_posts');
    }
};
