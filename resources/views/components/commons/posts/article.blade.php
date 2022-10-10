@foreach($posts as $post)
    <article class="mt-6">
        <div class="flex flex-col max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
            @auth
                <div>
                    @if($post->user->slug === auth()->user()->slug)
                        <div class="flex justify-end gap-4">
                            <a href="posts/edit/{{$post->id}}">✏️</a>
                            <form action="posts/destroy/{{$post->id}}" method="post" >
                                @csrf
                                <label for="destroy" class="hidden">Supprimer ce post</label>
                                <button name="destroy" id="destroy">❌</button>
                            </form>
                            @endif
                </div>

            @endauth
            <div class="flex items-center justify-between">
                <div>
                    <a href="/users/{{$post->user->slug}}/posts"
                       class="flex items-center mb-3">
                        <img src=" {{$post->user->avatar}}"
                             alt=" {{$post->user->name}}"
                             class="hidden object-cover w-10 h-10 mr-4 rounded-full sm:block">
                        <span class="font-bold text-gray-700 hover:underline"> {{ucwords($post->user->name)}}</span>
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
        </div>
    </article>
@endforeach
