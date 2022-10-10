<header class="px-6 py-4 bg-white shadow">
    <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
        <h1 class="flex items-center justify-between">
            <a href="/"
               class="text-xl font-bold text-gray-800 md:text-2xl">My Awesome Blog</a>
        </h1>
        <div>
            <form action="/" method="GET">
                <label class="hidden" for="search">Search</label>
                <input class="border-solid border-black" type="search" name="search" id="search"
                       placeholder="Search..."/>
                <label class="hidden" for="s">Send</label>
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-1"
                       type="submit" id="s" name="s" value="search"/>
                <input type="hidden" name="action" value="search">
                <input type="hidden" name="resource" value="post">
            </form>
        </div>
        <nav class="flex-col hidden md:flex md:flex-row md:-mx-4">
            <h2 class="sr-only">Main Navigation</h2>
            <a href="/"
               class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Home</a>
            @guest
                <a href="/login"
                   class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Login</a>
                <a href="/register"
                   class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Register</a>

            @endguest
            @auth
                <a href="/auth/{{auth()->user()->slug}}"
                   class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">{{auth()->user()->name}}</a>
                @can('create', \App\Models\Post::class)
                    <a href="/posts/create" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">New Post</a>
                @endcan
                <form action="/logout"
                      method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
        </nav>
        @if(session('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>
</header>
