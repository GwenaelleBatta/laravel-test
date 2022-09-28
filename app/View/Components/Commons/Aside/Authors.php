<?php

namespace App\View\Components\Commons\Aside;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Authors extends Component
{
    public Collection $users;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = User::withCount(['posts'])->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commons.aside.authors');
    }
}
