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
        // name, email, grade, image, gender
        Schema::create('students', function (Blueprint $table) {
            $table->id();  # pk of the table
            $table->string('name', length: 100);
            $table->string('email', length: 200)->nullable()->unique();
            $table->float('grade')->nullable();
            $table->string('image', length: 100)->nullable();
            $table->enum('gender', ['male', 'female'])->default('male')->nullable();
            $table->timestamps();  # create_at , updated_fields

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
