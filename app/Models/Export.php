<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @property string $type
 * @property string $status
 * @property string $file_path
 * @property array $filters 
 * @property-read \App\Models\User $user
 */

class Export extends Model
{
    protected $fillable = [
        'type',
        'status',
        'file_path',
        'filters'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
