<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputForm extends Component
{
    public string $name;
    public string $type;
    public string $placeholder;
    public string $model;
    public string $insideText;
    public string $classes;
    public string $value;
    public string $id;
    public $err;

    public function __construct(string $name, string $type, string $placeholder, string $model, string $id, string $insideText = "", string $classes = "", string $value = "", $err = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->insideText = $insideText;
        $this->classes = $classes;
        $this->value = $value;
        $this->err = $err;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-form');
    }
}
