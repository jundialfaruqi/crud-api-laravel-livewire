<div class="container-xl">
    <div class="row row-deck row-cards">
        @include('livewire.role.section-form')
        <div class="col-md-12">
            @if ($showTable)
                <div class="card rounded-4 shadow-sm">
                    <div class="card-table">
                        <div class="card-header">
                            @include('livewire.role.section-title')
                        </div>
                        <div>
                            @include('livewire.role.section-table')
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>