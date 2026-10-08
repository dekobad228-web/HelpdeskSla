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
        Schema::create('ticket_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('type');
            $table->string('old_value')->nullable();
            $table->string('new_value')->nullable();
            $table->timestamps();

            $table->index('ticket_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_events');
    }
};
