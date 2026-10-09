<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @property string $name
 * @property string $sla_first_response_minutes
 * @property string $sla_resolution_minutes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 */

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = [
        'name',
        'sla_first_response_minutes',
        'sla_resolution_minutes'
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'category_id', 'id');
    }
}
