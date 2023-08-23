<form wire:submit.prevent="save" class="form-submit">
    <div class="row g-4">
        <div class="col-6">
            <div class="form-group ">
                <label class="form-label" for="name">
                    Votre nom
                </label>
                <div class="form-control-wrap">
                    <input
                        type="text"
                        class="form-control @error('form.name') is-invalid @enderror"
                        id="name"
                        wire:model="form.name"
                        placeholder="Your Name">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group ">
                <label class="form-label" for="username">
                    Votre prenon
                </label>
                <div class="form-control-wrap">
                    <input
                        type="text"
                        class="form-control @error('form.username') is-invalid @enderror"
                        id="username"
                        wire:model="form.username"
                        placeholder="Your Name">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="numtel">
                    Numéro de téléphone
                </label>
                <div class="form-control-wrap">
                    <input
                        type="text"
                        class="form-control @error('form.numtel') is-invalid @enderror"
                        id="numtel"
                        wire:model="form.numtel"
                        placeholder="Numero de telephone">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="adresse">
                    Entrer votre adresse
                </label>
                <div class="form-control-wrap">
                    <input
                        type="text"
                        class="form-control @error('form.adresse') is-invalid @enderror"
                        id="adresse"
                        wire:model="form.adresse"
                        placeholder="Votre addresse">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="email">
                    Votre email
                </label>
                <div class="form-control-wrap">
                    <input
                        type="text"
                        class="form-control @error('form.email') is-invalid @enderror"
                        id="email"
                        wire:model="form.email"
                        placeholder="Enter Your Email">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="date_naissance">
                    Votre date de naissance
                </label>
                <div class="form-control-wrap">
                    <input
                        type="date"
                        class="form-control date-picker @error('form.date_naissance') is-invalid @enderror"
                        id="date_naissance"
                        data-date-format="yyyy-mm-dd"
                        wire:model="form.date_naissance"
                        placeholder="votre date de naissance">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="lieu_naissance">
                    Lieu de naissance
                </label>
                <div class="form-control-wrap">
                    <input
                        type="text"
                        class="form-control @error('form.lieu_naissance') is-invalid @enderror"
                        id="lieu_naissance"
                        wire:model="form.lieu_naissance"
                        placeholder="Lieu de naissance">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="urgence_telephone">
                    Numéro de téléphone d'urgence
                </label>
                <div class="form-control-wrap">
                    <input
                        type="text"
                        class="form-control @error('form.urgence_telephone') is-invalid @enderror"
                        id="urgence_telephone"
                        wire:model="form.urgence_telephone"
                        placeholder="Numero d'urgence">
                </div>
            </div>
        </div>
        <div class="col-12" wire:loading.attr.remove="disabled">
            <button type="submit" class="btn btn-lg btn-primary">
                Soumettre
            </button>
        </div>
    </div>
</form>
