<div>
    @if (!session('numtel'))
        <div class="alert alert-icon alert-danger" role="alert">
            <em class="icon ni ni-alert-circle"></em>
            <strong>Veillez vous inscrire avant de proceder a la reservation de votre chambre</strong>
        </div>
    @else
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
                                class="form-control  @error('form.username') is-invalid @enderror"
                                id="username"
                                wire:model="form.username"
                                placeholder="Your Name">
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
    @endif
</div>
