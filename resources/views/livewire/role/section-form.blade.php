@if ($showForm)
    <div class="col">
        <div class="card rounded-4 shadow-sm">
            <div class="card-header bg-primary-lt rounded-top-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-primary text-white rounded-circle me-2 mb-md-0 flex-shrink-0"
                        style="width: 40px; height: 40px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler-shield-plus">
                            <path d="M12.462 20.87c-.153 .047 -.307 .09 -.462 .13a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3a12 12 0 0 0 8.5 3a12 12 0 0 1 -.19 2.043" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="card-title">{{ $editMode ? 'Edit Role' : 'Tambah Role Baru' }}</h3>
                        <p class="text-muted mb-0 small">
                            {{ $editMode ? 'Perbarui informasi role di bawah ini' : 'Lengkapi form di bawah untuk menambahkan role baru' }}
                        </p>
                    </div>
                </div>
                <div class="align-items-center d-none d-md-block">
                    <span
                        class="badge {{ $editMode ? 'bg-warning-lt text-warning' : 'bg-primary-lt text-primary' }} me-2">
                        @if ($editMode)
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16"
                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" />
                            </svg>
                            Form Edit
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16"
                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Form Baru
                        @endif
                    </span>
                </div>
            </div>
            <form wire:submit.prevent="save">
                <div class="card-body">
                    <div class="space-y">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div>
                                <label class="form-label">Nama Role <span class="text-danger">*</span></label>
                                <input type="text" wire:model="name" placeholder="Masukkan nama role"
                                    class="form-control @error('name') is-invalid @enderror" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Guard Name <span class="text-danger">*</span></label>
                                <select wire:model="guard_name"
                                    class="form-select @error('guard_name') is-invalid @enderror">
                                    <option value="">Pilih Guard</option>
                                    <option value="web">Web</option>
                                    <option value="api">API</option>
                                </select>
                                @error('guard_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Permissions</label>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4 col-sm-6 mb-2">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                wire:model.defer="selectedPermissions" 
                                                value="{{ $permission->id }}">
                                            <span class="form-check-label">{{ $permission->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('selectedPermissions')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end rounded-bottom-4">
                    <div class="btn-list">
                        <button type="button" wire:click="hideForm" class="btn btn-secondary rounded-4">
                            <!-- Loading spinner for Batal button -->
                            <div wire:loading wire:target="hideForm" class="spinner-border spinner-border-sm me-2"
                                role="status" aria-hidden="true">
                            </div>
                            <!-- Default icon for Batal button -->
                            <svg wire:loading.remove wire:target="hideForm" xmlns="http://www.w3.org/2000/svg"
                                class="icon me-1" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>
                            <span wire:loading.remove wire:target="hideForm">Batal</span>
                            <span wire:loading wire:target="hideForm">Loading...</span>
                        </button>
                        <button type="submit" class="btn btn-primary rounded-4">
                            <!-- Loading spinner for Simpan button -->
                            <div wire:loading wire:target="save" class="spinner-border spinner-border-sm me-2"
                                role="status" aria-hidden="true"></div>
                            <!-- Default icon for Simpan button -->
                            <svg wire:loading.remove wire:target="save" xmlns="http://www.w3.org/2000/svg"
                                class="icon me-1" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                            <span wire:loading.remove wire:target="save">{{ $editMode ? 'Update' : 'Simpan' }}</span>
                            <span wire:loading
                                wire:target="save">{{ $editMode ? 'Memperbarui...' : 'Menyimpan...' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif