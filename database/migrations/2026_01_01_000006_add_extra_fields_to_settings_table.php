<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->foreignId('default_category_id')->nullable()->after('site_icon')->constrained('categories')->nullOnDelete();
            $table->unsignedInteger('posts_per_page')->default(6)->after('default_category_id');
            $table->boolean('comments_enabled')->default(true)->after('posts_per_page');
            $table->boolean('comments_require_approval')->default(true)->after('comments_enabled');
            $table->string('privacy_policy_url')->nullable()->after('comments_require_approval');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('default_category_id');
            $table->dropColumn(['posts_per_page', 'comments_enabled', 'comments_require_approval', 'privacy_policy_url']);
        });
    }
};
