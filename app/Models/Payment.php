<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_date',
        'amount',
        'payment_method',
        'observation',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'payment_method' => PaymentMethod::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
