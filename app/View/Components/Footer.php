<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Footer extends Component
{
    public $showBottomNavigation;
    public $showCopyright;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->showBottomNavigation = Route::is('dashboard');
        $this->showCopyright = Route::is('welcome') || Route::is('login') || Route::is('register');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
