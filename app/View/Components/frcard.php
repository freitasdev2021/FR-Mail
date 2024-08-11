<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class frcard extends Component
{
    public $id;
    public $submodulos;
    /**
     * Create a new component instance.
     */
    public function __construct($submodulos,$id)
    {
        $this->id = $id;
        $this->submodulos = $submodulos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Frcard');
    }
}
