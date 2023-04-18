<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class File extends Component
{
    public string $name;
    public bool $isRequired;
    public string $placeholder;
    public string $model;
    public string $classes;
    public string $value;
    public $th;

    protected array $rules = [
        'name' => 'required',
        'isRequired' => 'required',
        'type' => 'required',
        'placeholder' => 'required',
        'model' => 'required',
    ];
    /**
     * Create a new component instance.
     */
    public function __construct(string $name, bool $required, string $placeholder, string $model, $th = null, string $classes = "", string $value = "")
    {
        $this->name = $name;
        $this->isRequired = $required;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->th = $th;
        $this->classes = $classes;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.file');
    }
}
