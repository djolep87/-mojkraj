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
        // News table indexes
        Schema::table('news', function (Blueprint $table) {
            $table->index(['city', 'neighborhood', 'created_at'], 'idx_news_location');
            $table->index('user_id', 'idx_news_user');
            $table->index('created_at', 'idx_news_created');
        });

        // Business users table indexes
        Schema::table('business_users', function (Blueprint $table) {
            $table->index(['city', 'neighborhood'], 'idx_businesses_location');
            $table->index('email', 'idx_businesses_email');
        });

        // Offers table indexes
        Schema::table('offers', function (Blueprint $table) {
            $table->index(['business_user_id', 'valid_until'], 'idx_offers_business_valid');
            $table->index('business_user_id', 'idx_offers_business');
            $table->index('created_at', 'idx_offers_created');
        });

        // Pets posts table indexes
        Schema::table('pets_posts', function (Blueprint $table) {
            $table->index(['user_id', 'created_at'], 'idx_pets_user_created');
            $table->index('user_id', 'idx_pets_user');
            $table->index('created_at', 'idx_pets_created');
        });

        // Pets comments table indexes
        Schema::table('pets_comments', function (Blueprint $table) {
            $table->index('pets_post_id', 'idx_pets_comments_post');
            $table->index('user_id', 'idx_pets_comments_user');
        });

        // Pets likes table indexes
        Schema::table('pets_likes', function (Blueprint $table) {
            $table->index('pets_post_id', 'idx_pets_likes_post');
            $table->index('user_id', 'idx_pets_likes_user');
        });

        // News comments table indexes
        Schema::table('news_comments', function (Blueprint $table) {
            $table->index('news_id', 'idx_news_comments_news');
            $table->index('user_id', 'idx_news_comments_user');
        });

        // News likes table indexes
        Schema::table('news_likes', function (Blueprint $table) {
            $table->index('news_id', 'idx_news_likes_news');
            $table->index('user_id', 'idx_news_likes_user');
        });

        // Users table indexes
        Schema::table('users', function (Blueprint $table) {
            $table->index(['city', 'neighborhood'], 'idx_users_location');
            $table->index('email', 'idx_users_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indexes in reverse order
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('idx_users_location');
            $table->dropIndex('idx_users_email');
        });

        Schema::table('news_likes', function (Blueprint $table) {
            $table->dropIndex('idx_news_likes_news');
            $table->dropIndex('idx_news_likes_user');
        });

        Schema::table('news_comments', function (Blueprint $table) {
            $table->dropIndex('idx_news_comments_news');
            $table->dropIndex('idx_news_comments_user');
        });

        Schema::table('pets_likes', function (Blueprint $table) {
            $table->dropIndex('idx_pets_likes_post');
            $table->dropIndex('idx_pets_likes_user');
        });

        Schema::table('pets_comments', function (Blueprint $table) {
            $table->dropIndex('idx_pets_comments_post');
            $table->dropIndex('idx_pets_comments_user');
        });

        Schema::table('pets_posts', function (Blueprint $table) {
            $table->dropIndex('idx_pets_user_created');
            $table->dropIndex('idx_pets_user');
            $table->dropIndex('idx_pets_created');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->dropIndex('idx_offers_business_valid');
            $table->dropIndex('idx_offers_business');
            $table->dropIndex('idx_offers_created');
        });

        Schema::table('business_users', function (Blueprint $table) {
            $table->dropIndex('idx_businesses_location');
            $table->dropIndex('idx_businesses_email');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex('idx_news_location');
            $table->dropIndex('idx_news_user');
            $table->dropIndex('idx_news_created');
        });
    }
};
