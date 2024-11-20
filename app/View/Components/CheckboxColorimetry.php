<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CheckboxColorimetry extends Component
{
    public $options;

    public $selected;

    public function __construct(array $options, ?array $selected = null)
    {
        $this->options = $options;
        $this->selected = $selected;
    }

    public function render(): View
    {
        return view('components.checkboxColorimetry');
    }
}
