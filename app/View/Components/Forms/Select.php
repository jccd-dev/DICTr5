<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public bool $isRequired;
    public string $model;
    public string $insideText;
    public string $classes;
    public $options = [];
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
    public function __construct(string $name, bool $required, string $model, $options, string $insideText = "", string $classes = "", string $value = "", $err = null)
    {
        $this->name = $name;
        $this->isRequired = $required;
        $this->model = $model;
        $this->options = $options;
        $this->insideText = $insideText;
        $this->classes = $classes;
        $this->value = $value;
        $this->err = $err;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}
