<?php

namespace Akhaled\IconsDropdown\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class IconsDropdown extends Component
{
    public $names;
    public $filter;
    public $icons;

    public function mount()
    {
        $this->names = config('icons-dropdown.icons');
        $this->readIcons();
    }

    public function readIcons()
    {
        $this->icons = Cache::get('icons-list', []);
    }

    public function render()
    {
        return view('icons-dropdown::bootstrap4');
    }
}
