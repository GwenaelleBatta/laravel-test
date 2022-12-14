<?php

namespace App\View\Components\Commons\Posts;

use App\Models\Category;
use Illuminate\View\Component;
use Ramsey\Collection\Collection;

class SelectCategories extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commons.posts.select-categories');
    }
}
