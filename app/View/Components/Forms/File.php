<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class File extends Component
{
    public string $name;
    public string $placeholder;
    public string $model;
    public string $classes;
    public string $value;
    public string $id;
    public string $accept;
    public $th;
    public $err;

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
    public function __construct(string $name, string $placeholder, string $model, string $id, string $accept, $th = null, string $classes = "", string $value = "", $err = null)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->th = $th;
        $this->accept = $accept;
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
        return view('components.forms.file');
    }
}
