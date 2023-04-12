<?php

namespace App\View\Components\forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputForm extends Component
{
    public string $name;
    public bool $isRequired;
    public string $type;
    public string $placeholder;
    public string $model;
    public string $insideText;

    protected $rules = [
        'name' => 'required',
        'isRequired' => 'required',
        'type' => 'required',
        'placeholder' => 'required',
        'model' => 'required',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, bool $required, string $type, string $placeholder, string $model, string $insideText = "")
    {
        $this->name = $name;
        $this->isRequired = $required;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->insideText = $insideText;
    }

    public function submit() {
        $this->validate();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-form');
    }
}
