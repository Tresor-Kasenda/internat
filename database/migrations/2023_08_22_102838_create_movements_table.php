<?php

use App\Enums\MovementVisit;
use App\Enums\VisitType;
use App\Models\Visit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Visit::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->date('movement_date');
            $table->enum('status', [
                MovementVisit::REFUSE->value,
                MovementVisit::VALIDE->value
            ])->default(MovementVisit::REFUSE->value);
            $table->time('heure_arriver');
            $table->time('heure_sortie');
            $table->enum('type', [
                VisitType::EXTERNE->value,
                VisitType::INTERNE->value
            ])->default(VisitType::EXTERNE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
