<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ArticlePost extends Component
{
    public $post;
    public $perPage;
    public $sortOrder;

    protected $listeners = [
        'updatedByOrder' => 'updatePostWithDate'
    ];

    public function mount()
    {
        $this->perPage = 7;
        $this->sortOrder = 'ASC';
    }

    public function updatePostWithDate()
    {
        $this->sortOrder = $this->sortOrder == 'Newest' ? 'DESC' : 'ASC';
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.article-post', [
            'post' => Post::query()->orderBy('published_at', $this->sortOrder)->paginate(7)
        ]);
    }
}
