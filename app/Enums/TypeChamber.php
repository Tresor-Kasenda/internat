<?php

namespace App\Enums;

enum TypeChamber: string
{
    case SIMPLE = 'Simple';
    case DOUBLE = 'Double';
    case TRIPLE = 'Triple';
    case QUADRUPLE = 'Quadruple';
    case SUITE = 'Suite';
    case PRESIDENTIELLE = 'Présidentielle';
}
