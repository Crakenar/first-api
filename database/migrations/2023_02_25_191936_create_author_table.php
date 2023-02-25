<?php

use App\Models\Author;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("address");
            $table->enum("rank", Author::getRanks());
            $table->string("phone")->unique();
            $table->string("mail")->unique();
            $table->enum("nationality", Author::getNationalities());
            $table->date("email_verified_at");
            $table->date("date_of_birth");
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author');
    }
};
