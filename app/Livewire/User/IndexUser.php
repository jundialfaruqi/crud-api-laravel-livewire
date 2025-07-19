<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithPagination;
    #[Title('Manajemen User')]
    public $title = 'Manajemen User';

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

    protected $paginationTheme = 'bootstrap';
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
