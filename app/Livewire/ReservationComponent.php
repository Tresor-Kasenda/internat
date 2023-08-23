<?php

namespace App\Livewire;

use App\Livewire\Forms\Reservation;
use App\Models\Chambre;
use App\Models\User;
use App\Notifications\ReservationNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ReservationComponent extends Component
{
    public Reservation $form;
    public $user;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function booted(): void
    {
        if (session()->has('numtel')) {
            $this->user = User::query()
                ->where('numtel', session()->get('numtel'))
                ->first();
        }
    }

    #[Layout('layouts.app')]
    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.reservation-component', [
            'chambers' => Chambre::query()->get(),
            'user' => $this->user,
        ]);
    }

    public function save(): Redirector
    {
        $this->form->validate();

        $chamber = Chambre::query()
            ->create([

            ]);

        Notification::send($this->user, new ReservationNotification($chamber));

        session()->flash('success', 'Votre réservation a été enregistrée avec succès !');

        return $this->redirect('/');
    }
}
