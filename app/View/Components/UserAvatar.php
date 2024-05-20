<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserAvatar extends Component
{
    public $user;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\User $user
     * @return void
     */

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.user-avatar');
    }
}