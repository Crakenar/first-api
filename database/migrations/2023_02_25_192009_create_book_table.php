<?php

use App\Models\Book;
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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->unique();
            $table->string('description');
            $table->integer('number_pages');
            $table->enum('rank', Book::getBookLevels());
            $table->string('isbn');
            $table->float('price');
            $table->enum('lang', Book::getBookLang());
            $table->foreignUuid('author_id')->references('id')->on('authors');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
