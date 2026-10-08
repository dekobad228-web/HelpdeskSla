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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('comment_id')->nullable()->constrained('comments')->cascadeOnDelete();
            $table->string('path')->unique();
            $table->string('name');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');
            $table->timestamps();

            $table->index('ticket_id');
            $table->index('comment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};