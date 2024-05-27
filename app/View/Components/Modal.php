<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $messageId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $messageId)
    {
        $this->id = $id;
        $this->messageId = $messageId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
