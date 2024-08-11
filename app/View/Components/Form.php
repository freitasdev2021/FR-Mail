<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
    public $rota;

    public $enctype;
    /**
     * Create a new component instance.
     */
    public function __construct($rota,$enctype)
    {
        $this->enctype = $enctype;
        $this->rota = $rota;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Form');
    }
}
