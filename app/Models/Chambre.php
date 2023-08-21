<?php

namespace App\Models;

use App\Enums\TypeChamber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_chamber',
        'numero_chamber',
        'type_chamber',
        'description',
    ];

    protected $casts = [
        'type_chamber' => TypeChamber::class,
        'numero_chamber' => 'integer'
    ];
}
