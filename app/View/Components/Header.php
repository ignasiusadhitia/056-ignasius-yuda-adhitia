<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Header extends Component
{
    public $title;
    public $shouldShow;
    public $backUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $backUrl = null)
    {
        $this->title = $title ?? config('app.name');
        $this->shouldShow = !$this->isSpecialPage();
        $this->backUrl = $backUrl ?? route('dashboard');
    }

    /**
     * Determine if the header should be hidden on special pages.
     *
     */
    protected function isSpecialPage()
    {
        return Route::is('dashboard') || Route::is('login') || Route::is('register');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
