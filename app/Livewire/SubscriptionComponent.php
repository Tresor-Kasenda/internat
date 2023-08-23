<?php

namespace App\Livewire;

use App\Livewire\Forms\Subscription;
use App\Models\Interne;
use App\Models\User;
use App\Notifications\InscriptionNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SubscriptionComponent extends Component
{
    public Subscription $form;

    #[Layout('layouts.app')]
    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.subscription-component');
    }

    public function save()
    {
        $this->form->validate();

        $user = User::query()
            ->create([
                'name' => $this->form->name,
                'email' => $this->form->email,
                'password' => Hash::make($this->form->name),
                'username' => $this->form->username,
                'numtel' => $this->form->numtel,
                'adresse' => $this->form->adresse,
                'status' => false,
            ]);

        $user->assignRole('interne');

        session()->put('numtel', $user->numtel);

        Notification::send($user, new InscriptionNotification($user));

        Interne::query()
            ->create([
                'date_naissance' => $this->form->date_naissance,
                'lieu_naissance' => $this->form->lieu_naissance,
                'adresse' => $this->form->adresse,
                'telephone' => $this->form->numtel,
                'urgence_telephone' => $this->form->urgence_telephone,
                'user_id' => $user->id,
            ]);

        session()->flash('success', "Votre compte a été créé avec succès. Vous pouvez vous connecter maintenant.");

        return $this->redirect('/reserver');

    }
}
