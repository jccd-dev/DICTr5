<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageInput extends Component
{
//    public $imageFile;
    public string $name;
    public string $type;
//    public $img;

    protected array $rules = [
        'name' => 'required',
        'type' => 'required',
//        'img' => 'required',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
//        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.image-input');
    }
}
