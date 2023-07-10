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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->references('id')->on('users');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->text('snippets')->nullable();
            $table->string('code', 10);
            $table->double('price', 0);
            $table->double('discount')->nullable();
            $table->string('image');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
