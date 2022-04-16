<?php

namespace Akhaled\IconsDropdown\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class IconsDropdown extends Component
{
    public $names;
    public $filter;
    public $icons;
    public $resultCount;
    // input name
    public $name;
    // selected icon
    public $icon;

    public function mount(string $name, string $icon = null)
    {
        $this->name = $name;
        $this->icon = $icon;

        $this->names = config('icons-dropdown.icons');
        $this->readIcons(Arr::flatten(get_icons_list()));
    }

    public function updatedFilter(string $value)
    {
        $this->readIcons(
            Arr::where(Arr::flatten(get_icons_list()), function($icon) use ($value) {
                return Str::is("*".$value."*", $icon);
            })
        );
    }

    private function readIcons(array $result)
    {
        $this->resultCount = count($result);
        $this->icons = array_slice($result, 0, 72);
    }

    public function render()
    {
        return view('icons-dropdown::bootstrap4');
    }
}
