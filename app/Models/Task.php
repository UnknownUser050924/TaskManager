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
        'status',
        'due_date',
    ];

    // Optionally, you can cast attributes to specific data types
    protected $casts = [
        'status' => 'string',            // Casting status as string
        'due_date' => 'date',            // Casting due_date as date
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
