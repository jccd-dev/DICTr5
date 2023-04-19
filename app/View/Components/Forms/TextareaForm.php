<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextareaForm extends Component
{

    public string $name;
    public bool $isRequired;
    public string $placeholder;
    public string $model;
    public string $classes;
    public int $rows;
    public string $value;
    public $err;

    protected array $rules = [
        'name' => 'required',
        'isRequired' => 'required',
        'placeholder' => 'required',
        'model' => 'required',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, bool $required, string $placeholder, string $model, int $rows, string $classes = "", string $value = '', $err = null)
    {
        $this->name = $name;
        $this->isRequired = $required;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->rows = $rows;
        $this->classes = $classes;
        $this->value = $value;
        $this->err = $err;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.textarea-form');
    }
}
