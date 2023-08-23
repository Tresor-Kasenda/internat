<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chambre_id',
        'date_debut',
        'date_fin',
        'payment_method',
        'is_located',
    ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
        'is_located' => 'boolean',
        'payment_method' => PaymentMethod::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chambre(): BelongsTo
    {
        return $this->belongsTo(Chambre::class);
    }
}
