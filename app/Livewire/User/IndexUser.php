<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\ToastTrait;
use Livewire\Attributes\Url;

class IndexUser extends Component
{
    use WithPagination, WithFileUploads, ToastTrait;
    #[Title('Manajemen User')]
    public $title = 'Manajemen User';

    #[Url()]
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'desc';
    public $showColumns = [
        'name' => true,
        'username' => true,
        'email' => true,
        'phone' => true,
        'status_user' => true,
        'roles' => true,
    ];

    // Form properties
    public $showForm = false;
    public $showTable = true;
    public $editMode = false;
    public $editUserId = null;
    public $name = '';
    public $username = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $status_user = 'tidak aktif';
    public $photo;
    public $password = '';
    public $currentPhoto = null;

    // Delete properties
    public $showDeleteModal = false;
    public $deleteUserId = null;
    public $deleteUserName = '';

    protected $paginationTheme = 'bootstrap';

    #[Url()]
    public $paginate = 10;

    public function updatedPaginate()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function selectAllColumns()
    {
        $this->showColumns = [
            'name' => true,
            'username' => true,
            'email' => true,
            'phone' => true,
            'status_user' => true,
            'roles' => true,
        ];
    }

    public function resetColumns()
    {
        $this->showColumns = [
            'name' => true,
            'username' => true,
            'email' => true,
            'phone' => true,
            'status_user' => true,
            'roles' => true,
        ];
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function showAddForm()
    {
        $this->editMode = false;
        $this->showForm = true;
        $this->showTable = false;
        $this->resetForm();
    }

    public function showEditForm($userId)
    {
        $this->editMode = true;
        $this->editUserId = $userId;
        $this->showForm = true;
        $this->showTable = false;
        
        $user = User::findOrFail($userId);
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->status_user = $user->status_user;
        $this->currentPhoto = $user->photo;
        $this->password = ''; // Reset password field
    }

    public function hideForm()
    {
        $this->showForm = false;
        $this->resetForm();
        $this->showTable = true;
    }

    public function resetForm()
    {
        $this->editMode = false;
        $this->editUserId = null;
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->status_user = 'tidak aktif';
        $this->photo = null;
        $this->password = '';
        $this->currentPhoto = null;
        $this->resetValidation();
    }

    public function save()
    {
        if ($this->editMode) {
            $this->update();
        } else {
            $this->store();
        }
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',
                'status_user' => 'required|in:aktif,tidak aktif,diblokir',
                'photo' => 'nullable|image|max:2048',
                'password' => 'required|string|min:8|max:12',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'email.required' => 'Email harus diisi',
                'phone.required' => 'Nomor telepon harus diisi',
                'address.required' => 'Alamat harus diisi',
                'status_user.required' => 'Status user harus diisi',
                'photo.image' => 'File harus berupa gambar',
                'photo.max' => 'Ukuran file maksimal 2MB',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal :min karakter',
                'password.max' => 'Password maksimal :max karakter',
            ]
        );

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
        }

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'status_user' => $this->status_user,
            'photo' => $photoPath,
            'password' => Hash::make($this->password),
        ]);
        $this->showToast(message: ' User ' . $this->username . ' berhasil ditambahkan 👍');
        $this->hideForm();
        $this->resetPage();
    }

    public function update()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->editUserId,
            'email' => 'required|email|unique:users,email,' . $this->editUserId,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'status_user' => 'required|in:aktif,tidak aktif,diblokir',
            'photo' => 'nullable|image|max:2048',
        ];

        // Only validate password if it's provided
        if (!empty($this->password)) {
            $rules['password'] = 'string|min:8|max:12';
        }

        $this->validate(
            $rules,
            [
                'name.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'email.required' => 'Email harus diisi',
                'phone.required' => 'Nomor telepon harus diisi',
                'address.required' => 'Alamat harus diisi',
                'status_user.required' => 'Status user harus diisi',
                'photo.image' => 'File harus berupa gambar',
                'photo.max' => 'Ukuran file maksimal 2MB',
                'password.min' => 'Password minimal :min karakter',
                'password.max' => 'Password maksimal :max karakter',
            ]
        );

        $user = User::findOrFail($this->editUserId);
        
        $photoPath = $this->currentPhoto;
        if ($this->photo) {
            // Delete old photo if exists
            if ($this->currentPhoto) {
                Storage::disk('public')->delete($this->currentPhoto);
            }
            $photoPath = $this->photo->store('photos', 'public');
        }

        $updateData = [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'status_user' => $this->status_user,
            'photo' => $photoPath,
        ];

        // Only update password if provided
        if (!empty($this->password)) {
            $updateData['password'] = Hash::make($this->password);
        }

        $user->update($updateData);
        $this->showToast(message: ' User ' . $this->username . ' berhasil diperbarui 👍');
        $this->hideForm();
        $this->resetPage();
    }

    public function confirmDeleteModal($userId)
    {
        $user = User::findOrFail($userId);
        $this->deleteUserId = $userId;
        $this->deleteUserName = $user->name;
        $this->showDeleteModal = true;
    }

    public function confirmDelete()
    {
        $user = User::findOrFail($this->deleteUserId);
        
        // Delete photo if exists
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }
        
        $userName = $user->name;
        $user->delete();
        
        $this->showToast(message: ' User ' . $userName . ' berhasil dihapus 👍');
        $this->cancelDelete();
        $this->resetPage();
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->deleteUserId = null;
        $this->deleteUserName = '';
    }

    public function render()
    {
        $query = User::select('id', 'name', 'username', 'email', 'phone', 'status_user');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('status_user', 'like', '%' . $this->search . '%');
            });
        }

        $user = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.user.index-user', compact('user'));
    }
}
