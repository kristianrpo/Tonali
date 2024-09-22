<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('components.alert');
    }
}
