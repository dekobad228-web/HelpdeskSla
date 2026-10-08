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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->foreignId('customer_id')->constrained('users', 'id');
            $table->foreignId('assignee_id')->nullable()->constrained('users', 'id');
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->string('subject');
            $table->longText('body');
            $table->enum('priority', ['low', 'normal', 'high', 'urgent']);
            $table->enum('status', ['new', 'open', 'pending', 'resolved', 'closed']);
            $table->dateTime('first_response_at')->nullable();
            $table->dateTime('resolved_at')->nullable();
            $table->dateTime('first_response_due_at')->nullable();
            $table->dateTime('resolution_due_at')->nullable();
            $table->dateTime('sla_breached_at')->nullable();
            $table->timestamps();

            $table->index('customer_id');
            $table->index('assignee_id');
            $table->index('category_id');
            $table->index('priority');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
