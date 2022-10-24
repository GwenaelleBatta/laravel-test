<? php ?>
<x-commons.header></x-commons.header>
    <title>Les Posts du blog</title>
</head>
<body>
<x-commons.navigation></x-commons.navigation>
<div class="overflow-x-hidden bg-gray-100">
    <main class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Posts</h1>
                    @include('partials/_order-posts')
                </div>
                <x-commons.posts.article :posts="$posts"></x-commons.posts.article>
                <div class="mt-8">
                    <div class="flex">
                        <x-commons.pagination :posts="$posts"></x-commons.pagination>
                    </div>
                </div>
            </div>
            <x-commons.aside></x-commons.aside>
        </div>
    </main>
    <x-commons.footer/>
</body>
</html>

