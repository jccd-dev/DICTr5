<?php

namespace App\View\Components\Home\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HighlightPostSection extends Component
{

    public mixed $data;
    /**
     * Create a new component instance.
     */
    public function __construct(mixed $data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.section.highlight-post-section', ['data' => $this->data]);
    }
}
