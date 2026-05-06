<?php

use App\Models\PostCategory;
use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 2048);
            $table->string('slug', 2048);
            $table->longText('description')->nullable();
            $table->string('thumbnail', 2048)->nullable();
            $table->longText('content');
            $table->string('status')->default('published');
            $table->datetime('published_at');
            $table->foreignIdFor(PostCategory::class, 'category_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
