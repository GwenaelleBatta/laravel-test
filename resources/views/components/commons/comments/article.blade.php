<div class="mt-20">
    @foreach ($comments as $comment)
        <div class="pb-4 flex flex-col border-black border-b">
            <div class="container flex justify-between items-center gap-3 mt-3">
                <div class="container flex items-center gap-3 mt-3 mb-3">
                    <img class="rounded-t-full rounded-b-full max-h-12"
                         src="{{$comment->user->avatar}}"
                         alt="Avatar de {{ucwords($comment->user->name)}}">
                    <p><a href="/authors/{{ $comment->user->slug }}"
                          class="mx-1 font-bold text-gray-700 hover:underline">{{ ucwords($comment->user->name) }}</a>
                </div>
                @auth
                    @if(auth()->user()->name === $comment->user->name)
                        <div class="flex gap-4">
                            <a href="?modify-comment&id={{$comment->id}}">✏️</a>
                            <form action="/posts/{{$post->slug}}/comment/destroy/{{$comment->id}}" method="post">
                                @csrf
                                <button type="submit">❌︎</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="container flex">
                                <span class="font-light text-gray-600 mb-4">
                                    {{(new DateTime($comment->created_at))->format('M j, Y - G:i')}}
                                </span>
            </div>
            @auth
                @if(auth()->user()->name === $comment->user->name && request()->has('modify-comment') && request('id') == $comment->id)
                    <div class="update">
                        <form action="posts/{{$post->slug}}/comment/{{$comment->id}}" method="post">
                            @csrf
                            <label for="body"
                                   class="block mb-2 text-lg font-bold text-gray-700">Modify your
                                comment</label>
                            <textarea name="body"
                                      id="body"
                                      rows="7"
                                      class="pl-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$comment->body}}</textarea>
                            <div class="flex items-center mt-4  gap-6">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                                    type="submit">Modify
                                </button>
                                <a href="?" class="text-blue-500 hover:underline">Cancel</a>
                            </div>
                        </form>
                    </div>
                @endif
            @endauth
            <p>{{$comment->body}}</p>
        </div>
    @endforeach
</div>
