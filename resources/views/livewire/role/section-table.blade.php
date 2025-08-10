<div class="table-responsive">
    <table class="table table-vcenter table-selectable">
        <thead>
            <tr>
                @if ($showColumns['name'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('name')">
                            Nama Role
                        </button>
                    </th>
                @endif
                @if ($showColumns['guard_name'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('guard_name')">
                            Guard Name
                        </button>
                    </th>
                @endif
                @if ($showColumns['permissions'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" disabled>
                            Permissions
                        </button>
                    </th>
                @endif
                <th class="w-1">
                </th>
            </tr>
        </thead>
        <tbody class="table-tbody">
            @foreach ($roles as $roleData)
                <tr>
                    @if ($showColumns['name'])
                        <td class="sort-name">
                            <span class="avatar avatar-xs me-2 rounded-circle bg-primary-subtle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler-shield-check">
                                    <path
                                        d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                                    <path d="M9 12l2 2l4 -4" />
                                </svg>
                            </span>
                            {{ $roleData->name }}
                        </td>
                    @endif
                    @if ($showColumns['guard_name'])
                        <td>
                            <span class="badge bg-secondary-lt">{{ $roleData->guard_name }}</span>
                        </td>
                    @endif
                    @if ($showColumns['permissions'])
                        <td class="sort-tags">
                            <div class="badges-list">
                                @if ($roleData->permissions->count() == 0)
                                    <span class="text-muted">Tidak ada permission</span>
                                @else
                                    @foreach ($roleData->permissions->take(7) as $permission)
                                        <span class="badge">{{ $permission->name }}</span>
                                    @endforeach
                                    @if ($roleData->permissions->count() > 7)
                                        <button type="button" class="btn btn-sm btn-outline-primary ms-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#permissionsModal{{ $roleData->id }}">
                                            Lihat Semua ({{ $roleData->permissions->count() }})
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </td>
                    @endif
                    <td class="py-0">
                        <div class="btn-actions">
                            @can('Edit Role')
                                <button wire:click="showEditForm({{ $roleData->id }})" class="btn btn-action"
                                    aria-label="Edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                </button>
                            @endcan
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
                            @can('Delete Role')
                                <button type="button" class="btn btn-action" aria-label="Delete" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Hapus"
                                    wire:click="confirmDeleteModal({{ $roleData->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer rounded-4 shadow-sm py-2">
    {{ $roles->links() }}
</div>

<!-- Modal untuk menampilkan semua permissions -->
@foreach ($roles as $roleData)
    @if ($roleData->permissions->count() > 7)
        <div class="modal fade" id="permissionsModal{{ $roleData->id }}" tabindex="-1" aria-labelledby="permissionsModalLabel{{ $roleData->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="permissionsModalLabel{{ $roleData->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler-shield-check me-2">
                                <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                                <path d="M9 12l2 2l4 -4" />
                            </svg>
                            Permissions untuk Role: {{ $roleData->name }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-muted mb-3">Total {{ $roleData->permissions->count() }} permissions:</p>
                                <div class="badges-list">
                                    @foreach ($roleData->permissions as $permission)
                                        <span class="badge badge-outline me-1 mb-1">{{ $permission->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach

@include('livewire.role.section-modal-delete')
