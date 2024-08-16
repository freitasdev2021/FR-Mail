<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
    public $action;

    public $enctype;
    /**
     * Create a new component instance.
     */
    public function __construct($action,$enctype)
    {
        $this->enctype = $enctype;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Form');
    }
}
