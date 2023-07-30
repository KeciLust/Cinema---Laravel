<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class confSession extends Component
{

    public function __construct(
        public $halls,
        public $films
    ) {

    }

    public function render(): View|Closure|string
    {
        return view('components.conf-session');
    }
}
