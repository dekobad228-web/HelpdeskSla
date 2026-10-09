<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Cases\{TicketStatus, TicketPriority};

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @method static \Illuminate\Database\Eloquent\Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method \App\Models\Ticket firstOrNew(array $attributes = [], array $values = [])
 * @method \App\Models\Ticket firstOrFail($columns = [])
 * @method \App\Models\Ticket firstOrCreate(array $attributes, array $values = [])
 * @method \App\Models\Ticket firstOr($columns = [], \Closure $callback = null)
 * @method \App\Models\Ticket firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method \App\Models\Ticket updateOrCreate(array $attributes, array $values = [])
 * @property-read int $id
 * @property int $number
 * @property string $subject
 * @property string $body
 * @property string $priority
 * @property string $status
 * @property-read \App\Models\User $customer
 * @property-read \App\Models\User $assignee
 */

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = [
        'number',
        'customer_id',
        'assignee_id',
        'category_id',
        'subject',
        'body',
        'priority',
        'status'
    ];

    protected $casts = [
        'status' => TicketStatus::class,
        'proirity' => TicketPriority::class,
        'first_response_at' => 'datetime',
        'resolved_at' => 'datetime',
        'first_response_due_at' => 'datetime',
        'resolution_due_at' => 'datetime',
        'sla_breached_at' => 'datetime'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id', 'id');
    }
}
