<?php

namespace App\View\Components\Layouts\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $title;
    public string $target;
    public string $class;

    public array $rules = [
        'title' => 'required',
        'target' => 'required',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $target, string $class = "")
    {
        $this->title = $title;
        $this->target = $target;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.modal.alert');
    }
}
