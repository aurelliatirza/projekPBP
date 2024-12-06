<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebarDekan extends Component
{
    /**
     * Create a new component instance.
     */
    public $dekan;
    public function __construct($dekan)
    {
        $this->dekan = $dekan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-dekan');
    }
}
