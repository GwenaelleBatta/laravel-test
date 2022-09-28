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
                        <a href="/authors/{{$user->id}}/posts"
                           class="mx-1 font-bold text-gray-700 hover:underline">Sort
                            by {{ucwords($user->name)}} </a><br>
                        <span
                            class="mx-1 text-sm font-light text-gray-700">Created {{$user->posts_count}} Posts</span><br>
                        <a href="/authors/{{$user->id}}/posts"
                           class="mx-1 text-gray-500 hover:underline">View profil
                            of {{ucwords($user->name)}}</a>
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
</section>
