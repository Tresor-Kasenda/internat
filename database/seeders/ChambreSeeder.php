<?php

namespace Database\Seeders;

use App\Enums\TypeChamber;
use App\Models\Chambre;
use Illuminate\Database\Seeder;

class ChambreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'nom_chamber' => 'Chambre 1',
                'numero_chamber' => 0001,
                'type_chamber' => TypeChamber::SIMPLE->value,
                'description' => 'Chambre simple avec un lit',
            ],
            [
                'nom_chamber' => 'Chambre 4',
                'numero_chamber' => 0004,
                'type_chamber' => TypeChamber::SIMPLE->value,
                'description' => 'Chambre simple avec un lit',
            ], [
                'nom_chamber' => 'Chambre 5',
                'numero_chamber' => 0005,
                'type_chamber' => TypeChamber::SIMPLE->value,
                'description' => 'Chambre simple avec un lit',
            ],
            [
                'nom_chamber' => 'Chambre 2',
                'numero_chamber' => 0002,
                'type_chamber' => TypeChamber::DOUBLE->value,
                'description' => 'Chambre simple avec deux lits',
            ], [
                'nom_chamber' => 'Chambre 3',
                'numero_chamber' => 0003,
                'type_chamber' => TypeChamber::DOUBLE->value,
                'description' => 'Chambre simple avec deux lits',
            ],
        ])->each(fn($chamber) => Chambre::query()->create($chamber));
    }
}
