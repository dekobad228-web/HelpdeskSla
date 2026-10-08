<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketEvent extends Model
{
    public $table = 'ticket_events';

    protected $fillable = [
        'type',
        'old_value',
        'new_value'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
