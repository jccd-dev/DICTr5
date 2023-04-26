<?php

namespace App\View\Components\Layouts\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trainings extends Component
{
    public int $count = 0;

    /**
     * Create a new component instance.
     */
    public function __construct(int $count)
    {
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.forms.trainings');
    }
}
