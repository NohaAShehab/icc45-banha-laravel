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
        Schema::table('students', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('creator_id')->nullable();
 
            $table->foreign('creator_id')->references('id')->on('users')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
                # first drop index 
                $table->dropForeign('student_creator_id_foreign');

                // then drop column
                $table->dropColumn('creator_id');
        });
    }
};
