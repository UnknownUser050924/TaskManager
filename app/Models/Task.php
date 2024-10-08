<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    // Optionally, you can cast attributes to specific data types
    protected $casts = [
        'is_completed' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
