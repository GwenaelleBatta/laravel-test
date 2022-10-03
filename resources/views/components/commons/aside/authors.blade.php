<section class="px-8">
    <h3 class="mb-4 text-xl font-bold text-gray-700">Authors</h3>
    <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
        <ul class="-mx-4">
            @foreach ($users as $user)
                <li class="flex items-center mb-5">
                    <img
                        src=" {{$user->avatar}}"
                        alt="avatar"
                        class="object-cover w-12 h-12 mx-4 rounded-full">
                    <p>
                        <a href="/users/{{$user->slug}}/posts"
                           class="mx-1 font-bold text-gray-700 hover:underline">Sort
                            by {{ucwords($user->name)}} </a><br>
                        <span
                            class="mx-1 text-sm font-light text-gray-700">Created {{$user->posts_count}} Posts</span><br>
                    </p>
                </li>
            @endforeach
        </ul>
        @if(!request()->has('author-expended'))
        <a href="{{$_SERVER['REQUEST_URI']}}?author-expended">View all Author</a>
        @else
        <a href="{{strtok($_SERVER['REQUEST_URI'], "?")}}">Reduce Author</a>
        @endif
    </div>
</section>
