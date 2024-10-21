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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // varchar equivalent
            $table->text('email');
            $table->unsignedTinyInteger('dep_id'); // Foreign key column

            // Define the foreign key relationship
            $table->foreign('dep_id')->references('dep_id')->on('departments'); // Optional: Add cascade on delete

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
