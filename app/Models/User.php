<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method \App\Models\User firstOrNew(array $attributes = [], array $values = [])
 * @method \App\Models\User firstOrFail($columns = [])
 * @method \App\Models\User firstOrCreate(array $attributes, array $values = [])
 * @method \App\Models\User firstOr($columns = [], \Closure $callback = null)
 * @method \App\Models\User firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method \App\Models\User updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = [])
 * @method static static findOrFail($id, $columns = [])
 * @method static static findOrNew($id, $columns = [])
 * @method static null|static find($id, $columns = [])
 * 
 * @property-read int $id
 * 
 * @property string $role
 * @property string $name
 * @property string $email
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TicketEvent[] $ticketEvents
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Export[] $exports
 */

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'customer_id', 'id');
    }

    public function ticketEvents(): HasMany
    {
        return $this->hasMany(TicketEvent::class, 'user_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function exports(): HasMany
    {
        return $this->hasMany(Export::class, 'user_id', 'id');
    }
}
