<x-commons.header></x-commons.header>
    <title> {{$post->title}} - My Awesome Blog</title>
</head>
<body class="bg-gray-200">
<x-commons.navigation></x-commons.navigation>
<div class="overflow-x-hidden bg-gray-100">
    <main class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <article class="w-full lg:w-8/12">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-700 md:text-2xl">{{$post->title}}</h2>
                </div>
                <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <a href="?action=index&resource=post&author={{$post->user->slug}}"
                               class="flex items-center justify-end"><img
                                    src="{{$post->user->avatar}}"
                                    alt="avatar"
                                    class="hidden object-cover w-10 h-10 mr-4 rounded-full sm:block">
                                <span class="font-bold text-gray-700 hover:underline">{{ucwords($post->user->name)}}</span>
                            </a>
                            @foreach ($post->categories as $category)
                            <a href="/?action=index&resource=post&category={{strtolower($category->slug)}}"
                               class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ucwords($category->name)}}</a>
                            @endforeach
                        </div>
                        <div class="my-4">
                                    <span class="font-light text-gray-600">
                                        {{$post->published_at}}
                                    </span>
                        </div>
                        <div class="mt-2 text-gray-600">
                            {!!$post->body!!}
                        </div>
                    </div>
                    <div class="mt-10">
                        @if(!(request()->has('create-comment')))
                            <a href="?create-comment"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md">Add a new
                                comment</a>
                        @endif
                        @auth
                            @if(request()->has('create-comment'))
                                <div class="createComment">
                                    <form action="/posts/{{$post->slug}}"
                                          method="post">
                                        @csrf
                                        <label for="body"
                                               class="block mb-2 text-lg font-bold text-gray-700">Add a new comment</label>
                                        <textarea name="body"
                                                  id="body"
                                                  rows="7"
                                                  class="pl-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"><?= $_SESSION['old']['comment-body'] ?? '' ?></textarea>
                                        <div class="flex items-center mt-4 gap-6">
                                            <button type="submit" id="addComment"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                                Post
                                            </button>
                                            <a href="?" class="text-blue-500 hover:underline">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>

                </div>
                <x-commons.comments.article :post="$post"></x-commons.comments.article>
            </article>
            <x-commons.aside></x-commons.aside>
        </div>
    </main>
    <x-commons.footer/>
</div>
</body>
</html>
