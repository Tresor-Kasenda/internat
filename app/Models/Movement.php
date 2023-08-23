<?php

namespace App\Models;

use App\Enums\MovementVisit;
use App\Enums\VisitType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'movement_date',
        'status',
        'heure_arriver',
        'heure_sortie',
        'type',
        'visit_id'
    ];

    protected $casts = [
        'movement_date' => 'date',
        'heure_arriver' => 'time',
        'heure_sortie' => 'time',
        'type' => VisitType::class,
        'status' => MovementVisit::class
    ];

    public function visit(): BelongsTo
    {
        return $this->belongsTo(Visit::class);
    }
}
