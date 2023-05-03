<?php

namespace App\View\Components\Home\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class HomeSlider extends Component
{
    public Collection $data;
    /**
     * Create a new component instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function mount() {
        $this->data = collect([]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.section.home-slider', ['data' => $this->data]);
    }
}
