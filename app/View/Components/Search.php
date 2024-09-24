<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Search extends Component
{
    public $route;

    public function __construct(string $route)
    {
        $this->route = $route;
    }

    public function render(): View
    {
        return view('components.search');
    }
}
