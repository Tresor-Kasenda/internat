<?php

namespace App\Models;

use App\Enums\VisitType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'date_visit',
        'heure_arriver',
        'heure_sortie',
        'description',
        'status',
        'type'
    ];

    protected $casts = [
        'date_visit' => 'date',
        'heure_arriver' => 'time',
        'heure_sortie' => 'time',
        'status' => 'boolean',
        'type' => VisitType::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
