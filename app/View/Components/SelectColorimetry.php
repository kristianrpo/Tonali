<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SelectColorimetry extends Component
{
    public $label;

    public $name;

    public $options;

    public $placeholder;

    public $selected;

    public $styles;

    public function __construct(string $label, string $name, array $options, string $placeholder = '', ?string $selected = null, array $styles = [])
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->selected = $selected;
        $this->styles = $styles;
    }

    public function render(): View
    {
        return view('components.selectColorimetry');
    }
}
