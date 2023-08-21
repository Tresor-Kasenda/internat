<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'annee_academic',
        'faculty_id',
        'user_id',
    ];

    protected $casts = [
        'annee_academic' => 'date',
    ];

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
