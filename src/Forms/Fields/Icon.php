<?php

namespace Akhaled\IconsDropdown\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class Icon extends FormField
{
    protected function getTemplate()
    {
        return 'icons-dropdown::fields.icon';
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        $options['somedata'] = 'This is some data for view';

        return parent::render($options, $showLabel, $showField, $showError);
    }
}