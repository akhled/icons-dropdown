<?php

namespace Akhaled\IconsDropdown\Http\Livewire;

use Livewire\Component;

class IconsDropdown extends Component
{
    public $names;
    public $filter;

    public function mount()
    {
        $this->names = config('icons-dropdown.icons');
    }

    public function render()
    {
        return view('icons-dropdown::bootstrap4');
    }
}
