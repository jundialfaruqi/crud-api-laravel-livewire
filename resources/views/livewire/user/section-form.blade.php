@if ($showForm)
    <div class="col-12">
        <div class="card rounded-4 shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Tambah User Baru</h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
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
                        <div class="text-end">
                            <button type="button" wire:click="hideForm"
                                class="btn btn-secondary rounded-4">Batal</button>
                            <button type="submit" class="btn btn-primary rounded-4">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
