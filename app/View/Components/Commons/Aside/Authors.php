<?php

namespace App\View\Components\Commons\Aside;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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
        if(!request()->has('author-expended')){
            $this->users = User::withCount(['posts'])->limit(5)->get();
        }else{
            $this->users = User::withCount(['posts'])->get();
        }
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
