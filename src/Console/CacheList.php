<?php

namespace Akhaled\IconsDropdown\Console;

use BladeUI\Icons\Factory;
use BladeUI\Icons\IconsManifest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CacheList extends Command
{
    protected $name = 'icons:cache-list';

    protected $description = 'Cache installed icons list to file';

    public function handle(IconsManifest $manifest, Factory $factory)
    {
        $icons = [];

        foreach (config('icons-dropdown.icons') as $path => $name) {
            if (!File::exists("vendor/${path}")) {
                continue;
            }

            $icons[$path] = array_map(function($icon) {
                return str_replace(".svg", "", $icon);
            }, array_filter(scandir(base_path("vendor/${path}/resources/svg")), function($file) {
                return $file != '.' && $file != '..';
            }));
        }

        Cache::put('icons-list', $icons);
        Storage::disk('local')->put('icons-list-cached.php', sprintf("<?php return\n%s;", var_export($icons, true)));

        $this->info("Icons was cached successfully");

        return Command::SUCCESS;
    }
}
