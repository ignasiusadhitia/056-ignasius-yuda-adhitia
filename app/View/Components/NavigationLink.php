<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationLink extends Component
{
    /**
     * Create a new component instance.
     */
    public $href;
    public $text;
    public $active; // Optional

    public function __construct($href, $text, $active = false)
    {
        $this->href = $href;
        $this->text = $text;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation-link');
    }
}