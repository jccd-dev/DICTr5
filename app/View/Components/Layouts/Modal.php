<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{

    public string $title;
    public string $target;
    public string $method;
    public string $action;
    public string $class;

    public array $rules = [
        'title' => 'required',
        'target' => 'required',
        'method' => 'required',
        'action' => 'required',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $target, string $method, string $action, string $class = "")
    {
        $this->title = $title;
        $this->target = $target;
        $this->method = $method;
        $this->action = $action;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.modal');
    }

    public function submit()
    {
    }
}
