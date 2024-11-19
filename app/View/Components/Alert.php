<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $color;

    public function __construct(string $message, string $color = 'bg-palePink')
    {
        $this->message = $message;
        $this->color = $color;
    }

    public function render()
    {
        return view('components.alert');
    }
}
