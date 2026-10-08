<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = [
        'number',
        'subject',
        'body',
        'priority',
        'status'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongs(User::class, 'assignee_id', 'id');
    }
}
