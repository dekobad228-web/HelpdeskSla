<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property string $body
 * @property bool $is_internal
 * @property-read \App\Models\User $user
 */
class Comment extends Model
{
    use HasFactory;

    public $table = 'comments';

    protected $fillable = [
        'body',
        'is_internal'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
