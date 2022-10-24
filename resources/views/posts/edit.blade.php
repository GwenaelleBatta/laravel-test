
    <x-commons.header></x-commons.header>
    <title>Create A New Post - My Awesome Blog</title>
</head>
<x-head.tinymce-config/>
<body class="bg-gray-200">
<div class="overflow-x-hidden bg-gray-100">
    <x-commons.navigation></x-commons.navigation>
    <main class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Modify Post</h1>
                </div>
                <div class="mt-6">
                    <form action="/posts/edit/{{$post->id}}"
                          method="post">
                        @csrf
                        <label for="title"
                               class="block mb-2 @error('title') text-red-600 @enderror">Post
                            Title</label>
                        @error('title')
                        <div class="text-red-600 my-2">{{ $message }}</div>
                        @enderror
                        <input id="title"
                               type="text"
                               name="title"
                               class=" @error('title')  is-invalid outline outline-red-600 outline-2 @enderror w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{old('title')!== null ? old('title') : $post->title}}">

                        <label for="excerpt"
                               class="block mt-8 mb-2 @error('excerpt') text-red-600 @enderror">Post
                            Excerpt</label>
                        @error('excerpt')
                        <div class="text-red-600 my-2">{{ $message }}</div>
                        @enderror
                        <textarea name="excerpt"
                                  id="excerpt"
                                  rows="5"
                                  class="@error('excerpt')  is-invalid outline outline-red-600 outline-2 @enderror w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{old('excerpt')!== null ? old('excerpt') : $post->excerpt}}</textarea>

                        <label for="body"
                               class="block mt-8 mb-2 @error('body') text-red-600 @enderror">Post
                            Body</label>
                        @error('body')
                        <div class="text-red-600 my-2">{{ $message }}</div>
                        @enderror
                        <textarea name="body"
                                  id="body"
                                  rows="10"
                                  class=" @error('body')  is-invalid outline outline-red-600 outline-2 @enderror w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{old('body')!== null ? old('body') : $post->body}}</textarea>

                        <label for="category"
                               class="block mt-8 mb-2 @error('category') text-red-600 @enderror">Post
                            Category</label>
                        <x-commons.posts.select-categories :categories="$categories" :post="$post"></x-commons.posts.select-categories>
                        <button type="submit"
                                class="float-right mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                            Modify post
                        </button>
                    </form>
                    <x-forms.tinymce-editor/>
                </div>
            </div>
            <x-commons.aside></x-commons.aside>
        </div>
    </main>
    <x-commons.footer/>
</div>
</body>
</html>
