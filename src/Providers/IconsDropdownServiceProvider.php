<?php

namespace Akhaled\IconsDropdown\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Akhaled\IconsDropdown\Console\CacheList;
use Akhaled\IconsDropdown\Forms\Fields\Icon;
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
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        } else {
            $this->loadViewsFrom(__DIR__.'/../../resources/views', 'icons-dropdown');

            $this->registerComponents();
            $this->registerCustomFieldIcon();
        }
    }

    private function registerCommands()
    {
        $this->commands([
            CacheList::class,
        ]);
    }

    private function registerComponents()
    {
        Livewire::component('icons-dropdown', IconsDropdown::class);
    }

    private function registerCustomFieldIcon()
    {
        if (File::exists('vendor/kris/laravel-form-builder')) {
            config(['laravel-form-builder.custom_fields.icon' => Icon::class]);
        }
    }
}
