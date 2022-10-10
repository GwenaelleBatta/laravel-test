<?php

namespace App\View\Components\Commons\Comments;

use App\Models\Comment;
use Illuminate\View\Component;
use Ramsey\Collection\Collection;

class Article extends Component
{
    public $post;
    public $comments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
        $this->comments = Comment::with('post', 'user')->where('post_id', $post->id)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.commons.comments.article');
    }
}
