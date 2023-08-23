<?php

declare(strict_types=1);

use App\Livewire\ReservationComponent;
use App\Livewire\SubscriptionComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', SubscriptionComponent::class)->name('home');
Route::get('/reserver', ReservationComponent::class)->name('reserver');
