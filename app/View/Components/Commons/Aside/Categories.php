<?php

namespace App\View\Components\Commons\Aside;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Categories extends Component
{
    public Collection $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(!request()->has('category-expended')){
            $this->categories = Category::withCount('posts')->limit(3)->get();
        }else{
            $this->categories = Category::withCount('posts')->get();
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commons.aside.categories');
    }
}
