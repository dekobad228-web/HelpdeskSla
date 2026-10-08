<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property-read int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property string $type
 * @property string $old_value
 * @property string $new_value
 */

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
