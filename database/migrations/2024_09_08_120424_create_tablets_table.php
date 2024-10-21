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

            Schema::create('tablets', function (Blueprint $table) {
                $table->increments('tablet_id'); // Auto-incrementing INT primary key
                $table->string('tablet_name', 30); // VARCHAR(30)
                $table->unsignedBigInteger('doc_id'); // Foreign key must match the type of the referenced column in doctors (BIGINT)

                // Foreign key constraint on doc_id to doctors
                $table->foreign('doc_id')->references('id')->on('doctors')->onDelete('cascade'); // Cascade on delete to remove associated tablets when a doctor is deleted

                $table->timestamps();
            });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablets');
    }
};
