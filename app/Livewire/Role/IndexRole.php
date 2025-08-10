<?php

namespace App\Livewire\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\ToastTrait;
use Livewire\Attributes\Url;

class IndexRole extends Component
{
    use WithPagination, ToastTrait;
    #[Title('Manajemen Role')]
    public $title = 'Manajemen Role';

    #[Url()]
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'desc';
    public $showColumns = [
        'name' => true,
        'guard_name' => true,
        'permissions' => true,
    ];
    public $paginate = 10;

    // Form properties
    public $showForm = false;
    public $showTable = true;
    public $editMode = false;
    public $editRoleId = null;
    public $name = '';
    public $guard_name = 'web';
    public $selectedPermissions = [];
    public $permissions = [];

    // Delete properties
    public $showDeleteModal = false;
    public $deleteRoleId = null;
    public $deleteRoleName = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'guard_name' => 'required|string|max:255',
        'selectedPermissions' => 'array',
    ];

    protected $messages = [
        'name.required' => 'Nama role wajib diisi.',
        'name.string' => 'Nama role harus berupa teks.',
        'name.max' => 'Nama role maksimal 255 karakter.',
        'guard_name.required' => 'Guard name wajib diisi.',
        'guard_name.string' => 'Guard name harus berupa teks.',
        'guard_name.max' => 'Guard name maksimal 255 karakter.',
    ];

    public function mount()
    {
        $this->permissions = Permission::all();
        $this->showTable = true;
        $this->showForm = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function toggleColumn($column)
    {
        $this->showColumns[$column] = !$this->showColumns[$column];
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
        $this->showTable = false;
        $this->editMode = false;
    }

    public function showEditForm($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->editRoleId = $role->id;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
        $this->editMode = true;
        $this->showForm = true;
        $this->showTable = false;
    }

    public function save()
    {


        $this->validate();

        try {
            if ($this->editMode) {
                $role = Role::findOrFail($this->editRoleId);
                $role->update([
                    'name' => $this->name,
                    'guard_name' => $this->guard_name,
                ]);

                // Convert permission IDs to permission names
                $permissionNames = \Spatie\Permission\Models\Permission::whereIn('id', $this->selectedPermissions)
                    ->pluck('name')
                    ->toArray();
                $role->syncPermissions($permissionNames);
                $this->showToast(message: ' Role ' . $this->name . ' berhasil diperbarui 👍');
            } else {
                $role = Role::create([
                    'name' => $this->name,
                    'guard_name' => $this->guard_name,
                ]);
                // Convert permission IDs to permission names
                $permissionNames = \Spatie\Permission\Models\Permission::whereIn('id', $this->selectedPermissions)
                    ->pluck('name')
                    ->toArray();
                $role->syncPermissions($permissionNames);
                $this->showToast(message: ' Role ' . $this->name . ' berhasil ditambahkan 👍');
            }

            $this->resetForm();
            $this->showTable();
        } catch (\Exception $e) {
            $this->showToast('Terjadi kesalahan: ' . $e->getMessage(), 'error');
        }
    }

    public function confirmDeleteModal($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->deleteRoleId = $role->id;
        $this->deleteRoleName = $role->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete()
    {
        try {
            $role = Role::findOrFail($this->deleteRoleId);
            $role->delete();
            $this->showToast(message: ' Role ' . $this->deleteRoleName . ' berhasil dihapus 👍');
            $this->cancelDelete();
        } catch (\Exception $e) {
            $this->showToast('Terjadi kesalahan: ' . $e->getMessage(), 'error');
        }
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->deleteRoleId = null;
        $this->deleteRoleName = '';
    }

    public function hideForm()
    {
        $this->showForm = false;
        $this->resetForm();
        $this->showTable = true;
    }

    public function showTable()
    {
        $this->showForm = false;
        $this->showTable = true;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'guard_name',
            'selectedPermissions',
            'editMode',
            'editRoleId',
        ]);
        $this->guard_name = 'web';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $roles = Role::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('guard_name', 'like', '%' . $this->search . '%');
            })
            ->withCount('permissions')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->paginate);

        $permissions = Permission::all();

        return view('livewire.role.index-role', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}
