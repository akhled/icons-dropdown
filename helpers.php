<?php

use BladeUI\Icons\Factory;
use Illuminate\Support\Arr;
use BladeUI\Icons\IconsManifest;

if (! function_exists('get_icons_list') ) {
    /**
     * Get all icons list
     *
     * @param string $key
     * @return array
     */
    function get_icons_list() {
        $factory = app(Factory::class);
        $allSets = $factory->all();
        $manifest = app(IconsManifest::class)->getManifest(array_keys($allSets));

        return array_reduce(array_keys($manifest), function($carry, $set) use ($allSets, $manifest) {
            $carry[$set] = array_map(function($icon) use ($allSets, $set) {
                return $allSets[$set]['prefix']."-".$icon;
            }, Arr::flatten($manifest[$set]));

            return $carry;
        });
    }
}
