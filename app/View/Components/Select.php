<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $id;
    public $name;
    public $options;
    public $selectedValue;

    public function __construct($label, $id, $name, $options, $selectedValue = null)
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->options = $options;
        $this->selectedValue = $selectedValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select');
    }
}