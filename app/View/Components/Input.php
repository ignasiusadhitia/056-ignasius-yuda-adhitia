<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $id;
    public $name;
    public $value;
    public $required;

    public function __construct($label, $id, $name, $value = null, $required = false)
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}