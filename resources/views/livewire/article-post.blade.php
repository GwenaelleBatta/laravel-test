<div class="flex justify-end gap-4">
    @can('update', $post)
        <a href="/posts/edit/{{$post->id}}" class="text-blue-400">
            <svg class="h-6 w-6 text-indigo-300"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />  <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
        </a>
    @endcan
    @can('delete',$post)
        <form action="/posts/destroy/{{$post->id}}" method="post">
            @csrf
            <label for="destroy" class="hidden">Supprimer ce post</label>
            <button name="destroy" id="destroy" class="text-red-400">
                <svg class="h-6 w-6 text-red-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
            </button>
        </form>
    @endcan

</div>
<div class="flex items-center justify-between">
    <div>
        <a href="/users/{{$post->user->slug}}/posts"
           class="flex items-center mb-3">
            <img src=" {{$post->user->avatar}}"
                 alt=" {{$post->user->name}}"
                 class="hidden object-cover w-10 h-10 mr-4 rounded-full sm:block">
            <span
                class="font-bold text-gray-700 hover:underline"> {{ucwords($post->user->name)}}</span>
        </a>
        <span class="font-light text-gray-600">
                                            {{$post->published_at}}
                                        </span>
    </div>

    <div class="flex flex-col">
        @foreach ($post->categories as $category)
            <a href="/categories/{{$category->slug}}/posts"
               class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500 mb-2">
                {{ucwords($category->name)}}
            </a>
        @endforeach
    </div>
</div>
<h2 class="mt-2">
    <a href="/posts/{{$post->slug}}"
       class="text-2xl font-bold text-gray-700 hover:underline">
        {{$post->title}}
    </a>
    <p class="mt-2 text-gray-600">{{$post->excerpt}} </p>
</h2>
<div class="flex items-center justify-between mt-4">
    <a href="/posts/{{$post->slug}}"
       class="text-blue-500 hover:underline">
        Read more<span class="sr-only"> about {{$post->title}} </span>
    </a>
    <div class="flex">
        @if(count($post->comments) > 1)
            <p class="mr-4">Commentaires : {{count($post->comments)}}</p>
        @else
            <p class="mr-4">Aucun Commentaire</p>
        @endif
        <p>Ratings : {{$post->rating}} /5</p>
    </div>
</div>
