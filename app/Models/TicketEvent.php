<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method \App\Models\TicketEvent firstOrNew(array $attributes = [], array $values = [])
 * @method \App\Models\TicketEvent firstOrFail($columns = [])
 * @method \App\Models\TicketEvent firstOrCreate(array $attributes, array $values = [])
 * @method \App\Models\TicketEvent firstOr($columns = [], \Closure $callback = null)
 * @method \App\Models\TicketEvent firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method \App\Models\TicketEvent updateOrCreate(array $attributes, array $values = [])
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
