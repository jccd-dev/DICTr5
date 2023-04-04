<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{

    public string $name;
    public bool $required;
    public string $type;
    public string $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, bool $required, string $type, string $placeholder)
    {
        $this->name = $name;
        $this->required = $required;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
