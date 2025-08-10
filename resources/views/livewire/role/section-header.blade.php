<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{-- Page pre-title --}}
                <div class="page-pretitle">
                    <small>Overview</small>
                </div>
                <h2 class="page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler-shield-check">
                        <path d="M9 12l2 2l4 -4" />
                        <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                    </svg>
                    {{ $title }}
                </h2>
            </div>
            {{-- Page title actions --}}
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="#" class="btn rounded-4">
                            New view
                        </a>
                    </span>
                    @can('Create Role')
                        <button type="button" wire:click="showCreateForm"
                            class="btn btn-primary d-none d-sm-inline-block btn-animate-icon btn-animate-icon-rotate rounded-4">
                            <!-- Loading spinner -->
                            <div wire:loading wire:target="showCreateForm" class="spinner-border spinner-border-sm me-2"
                                role="status" aria-hidden="true"></div>
                            <!-- Default icon -->
                            <svg wire:loading.remove wire:target="showCreateForm" xmlns="http://www.w3.org/2000/svg"
                                class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            <span wire:loading.remove wire:target="showCreateForm">Tambah Role</span>
                            <span wire:loading wire:target="showCreateForm">Loading...</span>
                        </button>
                        <button type="button" wire:click="showCreateForm"
                            class="btn btn-primary d-sm-none btn-icon rounded-circle" aria-label="Tambah Role">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
