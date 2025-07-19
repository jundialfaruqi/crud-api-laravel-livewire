<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Title;

class IndexDashboard extends Component
{
    #[Title('Dashboard')]
    public $title = 'Dashboard';
    public function render()
    {
        return view('livewire.dashboard.index-dashboard');
    }
}
