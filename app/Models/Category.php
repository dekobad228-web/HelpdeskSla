<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = [
        'name',
        'sla_first_response_minutes',
        'sla_resolution_minutes'
    ];
}
