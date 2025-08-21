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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->text('comment_text');
            $table->foreignId('book_id')      // Foreign key column (unsigned big integer)
                  ->constrained()             // Adds constraint to books.id
                  ->onDelete('cascade');    // Delete comments if the parent book is deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
