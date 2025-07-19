<div class="table-responsive">
    <table class="table table-vcenter table-selectable">
        <thead>
            <tr>
                @if ($showColumns['name'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('name')">
                            Nama
                        </button>
                    </th>
                @endif
                @if ($showColumns['username'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('username')">
                            Username
                        </button>
                    </th>
                @endif
                @if ($showColumns['email'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('email')">
                            Email
                        </button>
                    </th>
                @endif
                @if ($showColumns['phone'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('phone')">
                            No Handphone
                        </button>
                    </th>
                @endif
                @if ($showColumns['status_user'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('status_user')">
                            Status
                        </button>
                    </th>
                @endif
                @if ($showColumns['roles'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" disabled>
                            Hak Akses
                        </button>
                    </th>
                @endif
                <th class="w-1">
                </th>
            </tr>
        </thead>
        <tbody class="table-tbody">
            @foreach ($user as $userData)
                <tr>
                    @if ($showColumns['name'])
                        <td class="sort-name">
                            <span class="avatar avatar-xs me-2 rounded-circle bg-primary-subtle"
                                style="background-image: url({{ asset('image/profil/user-photo-default.png') }})">
                            </span>
                            {{ $userData->name }}
                        </td>
                    @endif
                    @if ($showColumns['username'])
                        <td>{{ $userData->username }}</td>
                    @endif
                    @if ($showColumns['email'])
                        <td>{{ $userData->email }}</td>
                    @endif
                    @if ($showColumns['phone'])
                        <td>{{ $userData->phone }}</td>
                    @endif
                    @if ($showColumns['status_user'])
                        <td>
                            @if ($userData->status_user === 'aktif')
                                <span class="badge bg-success-lt">Aktif</span>
                            @elseif ($userData->status_user === 'tidak aktif')
                                <span class="badge bg-danger-lt">Tidak Aktif</span>
                            @elseif ($userData->status_user === 'diblokir')
                                <span class="badge bg-warning-lt">Diblokir</span>
                            @endif
                        </td>
                    @endif
                    @if ($showColumns['roles'])
                        <td class="sort-tags">
                            <div class="badges-list">
                                <span class="badge">Event</span>
                                <span class="badge">Tickets</span>
                            </div>
                        </td>
                    @endif
                    <td class="py-0">
                        <div class="btn-actions">
                            <a href="#" class="btn btn-action" aria-label="Edit" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Ubah">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </a>
                            <a href="#" class="btn btn-action" aria-label="Copy">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path
                                        d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                    <path
                                        d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                </svg>
                            </a>
                            <a href="#" class="btn btn-action" aria-label="Delete" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer rounded-4 shadow-sm py-2">
    {{ $user->links() }}
</div>
