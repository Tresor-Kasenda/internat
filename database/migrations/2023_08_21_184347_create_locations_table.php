<?php

use App\Enums\PaymentMethod;
use App\Models\Chambre;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Chambre::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->datetime('date_debut');
            $table->datetime('date_fin');
            $table->enum('payment_method', [
                PaymentMethod::Cash->value,
                PaymentMethod::MobileMoney->value,
                PaymentMethod::Autre->value,
            ])->default(PaymentMethod::Cash->value);
            $table->boolean('is_located')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
