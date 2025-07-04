<?php

namespace App\Livewire;

use Livewire\Component;

class TabManager extends Component
{
    public function render()
    {
        return view('livewire.tab-manager')->layout('layout');
    }
}
