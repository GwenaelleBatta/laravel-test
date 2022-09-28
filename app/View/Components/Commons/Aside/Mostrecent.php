<?php

namespace App\View\Components\Commons\Aside;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Mostrecent extends Component
{
    public $post;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->post = Post::latest()->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commons.aside.mostrecent');
    }
}
