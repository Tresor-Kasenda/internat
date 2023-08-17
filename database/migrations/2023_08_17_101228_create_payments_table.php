<?php

use App\Enums\PaymentMethod;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->date('payment_date');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', [
                PaymentMethod::Cash->value,
                PaymentMethod::MobileMoney->value,
                PaymentMethod::Autre->value,
            ])->default(PaymentMethod::Cash->value);
            $table->mediumText('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
