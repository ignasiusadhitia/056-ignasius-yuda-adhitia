<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionItem extends Component
{
    public $question;
    public $currentPage;
    public $perPage;
    public $index;
    /**
     * Create a new component instance.
     */
    public function __construct($question, $currentPage, $perPage, $index)
    {
        $this->question = $question;
        $this->currentPage = $currentPage;
        $this->perPage = $perPage;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question-item');
    }
}
