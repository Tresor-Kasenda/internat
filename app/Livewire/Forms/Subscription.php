<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class Subscription extends Form
{
    #[Rule(['required', 'string'])]
    public string $name = '';
    #[Rule(['required', 'string'])]
    public string $username = '';
    #[Rule(['required', 'numeric', 'unique:users,numtel'])]
    public string $numtel = '';
    #[Rule(['required'])]
    public string $adresse = '';
    #[Rule([
        'required',
        'email',
        'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        'unique:users,email'
    ])]
    public string $email = '';
    #[Rule(['required', 'date'])]
    public string $date_naissance = '';
    #[Rule(['required'])]
    public string $lieu_naissance = '';
    #[Rule(['required', 'numeric'])]
    public string $urgence_telephone = '';
}
