<div class="row w-full">
    <div class="col">
        <div class="d-flex align-items-center">
            <span class="avatar me-2 rounded-circle mb-3 mb-md-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>
            </span>
            <div>
                <h3 class="card-title">
                    Daftar User
                </h3>
                <p class="text-secondary mb-3 mb-md-0 small">Kelola data pengguna</p>
            </div>
        </div>
    </div>
    <div class="col-md-auto col-sm-12">
        <div class="ms-auto d-flex flex-wrap btn-list">
            <div class="input-group input-group-flat w-auto">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-1">
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </span>
                <input wire:model.live="search" type="text" class="form-control" autocomplete="off"
                    id="search-input" />
                <span class="input-group-text">
                    <kbd>Ctrl</kbd> + <kbd>K</kbd>
                </span>
            </div>
            <div class="dropdown">
                <a href="#" class="btn rounded-4 dropdown-toggle" data-bs-toggle="dropdown" aria-label="Filter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-filter-2-cog">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6h16" />
                        <path d="M6 12h12" />
                        <path d="M9 18h3" />
                        <path
                            d="M19.001 21c-.53 0 -1.039 -.211 -1.414 -.586c-.375 -.375 -.586 -.884 -.586 -1.414c0 -.53 .211 -1.039 .586 -1.414c.375 -.375 .884 -.586 1.414 -.586m0 4c.53 0 1.039 -.211 1.414 -.586c.375 -.375 .586 -.884 .586 -1.414c0 -.53 -.211 -1.039 -.586 -1.414c-.375 -.375 -.884 -.586 -1.414 -.586m0 4v1.5m0 -5.5v-1.5m3.031 1.75l-1.299 .75m-3.463 2l-1.3 .75m0 -3.5l1.3 .75m3.463 2l1.3 .75" />
                    </svg>
                    Filter
                </a>
                <div class="dropdown-menu p-3 rounded-4" style="min-width: 280px;">
                    <h6 class="dropdown-header px-0 mb-2">Pilih Kolom yang Ditampilkan</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input rounded-circle" type="checkbox"
                            wire:model.live="showColumns.name" id="col-name">
                        <label class="form-check-label" for="col-name">
                            Nama
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input rounded-circle" type="checkbox"
                            wire:model.live="showColumns.username" id="col-username">
                        <label class="form-check-label" for="col-username">
                            Username
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input rounded-circle" type="checkbox"
                            wire:model.live="showColumns.email" id="col-email">
                        <label class="form-check-label" for="col-email">
                            Email
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input rounded-circle" type="checkbox"
                            wire:model.live="showColumns.phone" id="col-phone">
                        <label class="form-check-label" for="col-phone">
                            No Handphone
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input rounded-circle" type="checkbox"
                            wire:model.live="showColumns.status_user" id="col-status">
                        <label class="form-check-label" for="col-status">
                            Status User
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input rounded-circle" type="checkbox"
                            wire:model.live="showColumns.roles" id="col-roles">
                        <label class="form-check-label" for="col-roles">
                            Hak Akses
                        </label>
                    </div>
                    <hr class="my-2">
                    <div class="d-flex gap-2">
                        <button wire:click="selectAllColumns" class="btn btn-primary btn-sm flex-fill rounded-3">
                            Pilih Semua
                        </button>
                        <button wire:click="resetColumns" class="btn btn-secondary btn-sm flex-fill rounded-3">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="btn dropdown-toggle rounded-4" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                        <path d="M7 11l5 5l5 -5" />
                        <path d="M12 4l0 12" />
                    </svg>
                    Download</a>
                <div class="dropdown-menu rounded-4">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Third action</a>
                </div>
            </div>
            <div class="dropdown">
                <a class="btn dropdown-toggle rounded-4" data-bs-toggle="dropdown">
                    <span class="me-1">{{ $paginate }}</span>
                    <span>records</span>
                </a>
                <div class="dropdown-menu rounded-4">
                    <a class="dropdown-item" wire:click="$set('paginate', 10)">10 records</a>
                    <a class="dropdown-item" wire:click="$set('paginate', 20)">20 records</a>
                    <a class="dropdown-item" wire:click="$set('paginate', 50)">50 records</a>
                    <a class="dropdown-item" wire:click="$set('paginate', 100)">100 records</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('keydown', function(event) {
        // Check if Ctrl+K is pressed
        if (event.ctrlKey && event.key === 'k') {
            event.preventDefault(); // Prevent default browser behavior
            const searchInput = document.getElementById('search-input');
            if (searchInput) {
                searchInput.focus();
                searchInput.select(); // Optional: select all text in the input
            }
        }
    });
</script>
