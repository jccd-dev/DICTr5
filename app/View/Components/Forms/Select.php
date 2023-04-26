<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $model;
    public string $insideText;
    public string $classes;
    public $options = [];
    public string $value;
    public string $id;
    public $err;
    public string $dataValue;

    protected array $rules = [
        'name' => 'required',
        'isRequired' => 'required',
        'placeholder' => 'required',
        'model' => 'required',
    ];
    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $model, string $id, $options = [], string $insideText = "", string $classes = "", string $value = "", $err = null, string $dataValue = "")
    {
        $this->name = $name;
        $this->model = $model;
        $this->options = $options;
        $this->insideText = $insideText;
        $this->classes = $classes;
        $this->value = $value;
        $this->err = $err;
        $this->id = $id;
        $this->dataValue = $dataValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}
