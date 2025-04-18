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
        Schema::table('ebooks', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->text('description')->after('title');
            $table->string('cover_image')->nullable()->after('description');
            $table->string('purchase_link')->after('cover_image');
        });
    }
    
    public function down(): void
    {
        Schema::table('ebooks', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'cover_image', 'purchase_link']);
        });
    }
    
};
