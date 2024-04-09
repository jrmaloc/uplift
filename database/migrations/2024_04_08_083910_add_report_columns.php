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
        //
        Schema::table('users', function (Blueprint $table) {
            $table->json('reported')->nullable();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->json('reported')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->json('reported')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('reported?');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('reported?');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('reported?');
        });
    }
};
