<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductFilter extends Component
{
    public $categories;

    public $priceRanges;

    public $route;

    public function __construct($categories, $priceRanges, $route)
    {
        $this->categories = $categories;
        $this->priceRanges = $priceRanges;
        $this->route = $route;

    }

    public function render()
    {
        return view('components.product-filter');
    }
}
