<div class="table-responsive">
    <table class="table table-vcenter table-selectable">
        <thead>
            <tr>
                @if ($showColumns['name'])
                    <th>
                        <button class="table-sort d-flex justify-content-between" wire:click="sortBy('name')">
                            Nama Permission
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
                <th class="w-1">
                </th>
            </tr>
        </thead>
        <tbody class="table-tbody">
            @foreach ($permissions as $permissionData)
                <tr>
                    @if ($showColumns['name'])
                        <td class="sort-name">
                            <span class="avatar avatar-xs me-2 rounded-circle bg-primary-subtle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-key">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" />
                                    <path d="M15 9h.01" />
                                </svg>
                            </span>
                            {{ $permissionData->name }}
                        </td>
                    @endif
                    @if ($showColumns['guard_name'])
                        <td>
                            <span class="badge bg-secondary-lt">{{ $permissionData->guard_name }}</span>
                        </td>
                    @endif
                    <td class="py-0">
                        <div class="btn-actions">
                            @can('Edit Permission')
                                <button wire:click="showEditForm({{ $permissionData->id }})" class="btn btn-action"
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
                            @can('Delete Permission')
                                <button type="button" class="btn btn-action" aria-label="Delete" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Hapus"
                                    wire:click="confirmDeleteModal({{ $permissionData->id }})">
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
    {{ $permissions->links() }}
</div>

@include('livewire.permission.section-modal-delete')
