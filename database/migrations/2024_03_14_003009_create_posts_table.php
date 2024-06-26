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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->json('tags')->nullable();
            $table->string('caption')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->json('reactors')->nullable();
            $table->enum('privacy', ['public', 'private',])->nullable();
            $table->timestamps();
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
