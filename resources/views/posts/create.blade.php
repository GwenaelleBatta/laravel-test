<x-commons.header></x-commons.header>
    <title>Create A New Post - My Awesome Blog</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <x-head.tinymce-config></x-head.tinymce-config>
</head>
<body class="bg-gray-200">
<div class="overflow-x-hidden bg-gray-100">
    <x-commons.navigation></x-commons.navigation>
    <main class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Create Post</h1>
                </div>
                <div class="mt-6">
                    <form action="/posts/create"
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
                               class=" @error('title')  is-invalid outline outline-red-600 outline-2 @enderror w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{old('title')}}">

                        <label for="excerpt"
                               class="block mt-8 mb-2 @error('excerpt') text-red-600 @enderror">Post
                            Excerpt</label>
                        @error('excerpt')
                        <div class="text-red-600 my-2">{{ $message }}</div>
                        @enderror
                        <textarea name="excerpt"
                                  id="excerpt"
                                  rows="5"
                                  class="@error('excerpt')  is-invalid outline outline-red-600 outline-2 @enderror w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{old('excerpt')}}</textarea>


                        <x-forms.tinymce-editor :post="$post??null"></x-forms.tinymce-editor>
                        <label for="category"
                               class="block mt-8 mb-2 @error('category') text-red-600 @enderror">Post
                            Category</label>
                        <x-commons.posts.select-categories></x-commons.posts.select-categories>
                        <button type="submit"
                                class="float-right mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                            Create new post
                        </button>
                    </form>
                </div>
            </div>
            <x-commons.aside></x-commons.aside>
        </div>
    </main>
    <x-commons.footer></x-commons.footer>
</div>
</body>
</html>
