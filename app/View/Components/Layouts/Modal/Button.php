<?php

namespace App\View\Components\Layouts\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $name;
    public string $target;

    public array $rules = [
        'name' => 'required',
        'target' => 'required'
    ];
    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $target)
    {
        $this->name = $name;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.modal.button');
    }
}
