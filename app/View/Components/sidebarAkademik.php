<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebarAkademik extends Component
{
    /**
     * Create a new component instance.
     */
    public $akademik;
    public function __construct($akademik)
    {
        $this->akademik = $akademik;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-akademik');
    }
}
