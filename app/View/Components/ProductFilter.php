<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ProductFilter extends Component
{
    public $categories;

    public $priceRanges;

    public $route;

    public function __construct(Collection $categories, array $priceRanges, string $route)
    {
        $this->categories = $categories;
        $this->priceRanges = $priceRanges;
        $this->route = $route;
    }

    public function render(): View
    {
        return view('components.productFilter');
    }
}
