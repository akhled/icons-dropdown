<?php

namespace Akhaled\IconsDropdown\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Akhaled\IconsDropdown\Http\Livewire\IconsDropdown;

class IconsDropdownServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/icons-dropdown.php', 'icons-dropdown'
        );
    }

    public function boot()
    {
        $this->readViewsFrom(__DIR__.'/../../resources/views', 'icons-dropdown');

        $this->registerComponents();
    }

    private function registerComponents()
    {
        Livewire::component('icons-dropdown', IconsDropdown::class);
    }
}
