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
        Schema::create('cms_data', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('bg_image_path');
            $table->text('content');
            $table->string('docpath_1')->nullable();
            $table->string('docpath_2')->nullable();
            $table->string('docpath_3')->nullable();
            $table->string('docpath_4')->nullable();
            $table->string('docpath_5')->nullable();
            $table->string('docpath_6')->nullable();
            $table->string('docpath_7')->nullable();
            $table->string('docpath_8')->nullable();
            $table->string('docpath_9')->nullable();
            $table->string('docpath_10')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_data');
    }
};
