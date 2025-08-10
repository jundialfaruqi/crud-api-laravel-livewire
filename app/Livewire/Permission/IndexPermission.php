<?php

namespace App\Livewire\Permission;

use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\ToastTrait;
use Livewire\Attributes\Url;

class IndexPermission extends Component
{
    use WithPagination, ToastTrait;
    #[Title('Manajemen Permission')]
    public $title = 'Manajemen Permission';

    #[Url()]
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'desc';
    public $showColumns = [
        'name' => true,
        'guard_name' => true,
    ];
    public $paginate = 10;

    // Form properties
    public $showForm = false;
    public $showTable = true;
    public $editMode = false;
    public $editPermissionId = null;
    public $name = '';
    public $guard_name = 'web';

    // Delete properties
    public $showDeleteModal = false;
    public $deletePermissionId = null;
    public $deletePermissionName = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'guard_name' => 'required|string|max:255',
    ];

    protected $messages = [
        'name.required' => 'Nama permission wajib diisi.',
        'name.string' => 'Nama permission harus berupa teks.',
        'name.max' => 'Nama permission maksimal 255 karakter.',
        'guard_name.required' => 'Guard name wajib diisi.',
        'guard_name.string' => 'Guard name harus berupa teks.',
        'guard_name.max' => 'Guard name maksimal 255 karakter.',
    ];

    public function mount()
    {
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

    public function showEditForm($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $this->editPermissionId = $permission->id;
        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
        $this->editMode = true;
        $this->showForm = true;
        $this->showTable = false;
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->editMode) {
                $permission = Permission::findOrFail($this->editPermissionId);
                $permission->update([
                    'name' => $this->name,
                    'guard_name' => $this->guard_name,
                ]);
                $this->showToast('Permission berhasil diperbarui!', 'success');
            } else {
                Permission::create([
                    'name' => $this->name,
                    'guard_name' => $this->guard_name,
                ]);
                $this->showToast('Permission berhasil ditambahkan!', 'success');
            }

            $this->resetForm();
            $this->showTable();
        } catch (\Exception $e) {
            $this->showToast('Terjadi kesalahan: ' . $e->getMessage(), 'error');
        }
    }

    public function confirmDeleteModal($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $this->deletePermissionId = $permission->id;
        $this->deletePermissionName = $permission->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete()
    {
        try {
            $permission = Permission::findOrFail($this->deletePermissionId);
            $permission->delete();
            $this->showToast('Permission berhasil dihapus!', 'success');
            $this->cancelDelete();
        } catch (\Exception $e) {
            $this->showToast('Terjadi kesalahan: ' . $e->getMessage(), 'error');
        }
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->deletePermissionId = null;
        $this->deletePermissionName = '';
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
            'editMode',
            'editPermissionId',
        ]);
        $this->guard_name = 'web';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $permissions = Permission::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('guard_name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.permission.index-permission', [
            'permissions' => $permissions,
        ]);
    }
}
