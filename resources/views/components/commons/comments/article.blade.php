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
                            <a href="?modify-comment&id={{$comment->id}}" class="text-blue-400">
                                <svg class="h-6 w-6 text-indigo-300"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />  <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
                            </a>
                            <form action="/posts/{{$post->slug}}/comment/destroy/{{$comment->id}}" method="post">
                                @csrf
                                <label for="delete" class="hidden">Supprimer le commentaire</label>
                                <button name="delete" id="delete" type="submit" class="text-red-400">
                                    <svg class="h-6 w-6 text-red-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                </button>
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
