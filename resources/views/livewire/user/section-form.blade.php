@if ($showForm)
    <div class="col">
        <div class="card rounded-4 shadow-sm">
            <div class="card-header bg-primary-lt rounded-top-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-primary text-white rounded-circle me-2 mb-3 mb-md-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="card-title">Tambah User Baru</h3>
                        <p class="text-muted mb-0 small">Lengkapi form di bawah untuk menambahkan user baru ke
                            sistem</p>
                    </div>
                </div>
                <div class="align-items-center">
                    <span class="badge bg-primary-lt text-primary me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16" height="16"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Form Baru
                    </span>
                </div>
            </div>
            <form wire:submit.prevent="save">
                <div class="card-body">
                    <div class="space-y">
                        <div class="row row-cols-2 g-4">
                            <div>
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" wire:model="name" placeholder="Enter full name"
                                    class="form-control @error('name') is-invalid @enderror" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                <input type="text" wire:model="username" placeholder="Enter username"
                                    class="form-control @error('username') is-invalid @enderror" />
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" wire:model="email" placeholder="Enter email address"
                                    class="form-control @error('email') is-invalid @enderror" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" wire:model="phone" placeholder="Enter phone number"
                                    class="form-control @error('phone') is-invalid @enderror" maxlength="20" />
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea wire:model="address" class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter full address" rows="3"></textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row row-cols-2 g-4">
                            <div>
                                <label class="form-label">Status User <span class="text-danger">*</span></label>
                                <select wire:model="status_user"
                                    class="form-select @error('status_user') is-invalid @enderror">
                                    <option value="tidak aktif">Tidak Aktif</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="diblokir">Diblokir</option>
                                </select>
                                @error('status_user')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Photo</label>
                                <input type="file" wire:model="photo"
                                    class="form-control @error('photo') is-invalid @enderror" accept="image/*" />
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if ($photo)
                                    <div class="mt-2">
                                        <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail"
                                            style="max-width: 100px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" wire:model="password" placeholder="Enter password"
                                class="form-control @error('password') is-invalid @enderror" />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
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
                            <span wire:loading.remove wire:target="save">Simpan</span>
                            <span wire:loading wire:target="save">Menyimpan...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
