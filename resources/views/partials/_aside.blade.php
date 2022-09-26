<aside class="hidden w-4/12 -mx-8 lg:block">
    <h2 class="sr-only">Posts filters </h2>
    <section class="px-8">
        <h3 class="mb-4 text-xl font-bold text-gray-700">Authors</h3>
        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
            <ul class="-mx-4">
                @foreach ($aside['users'] as $user)
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
                                class="mx-1 text-sm font-light text-gray-700">Created {{$user->posts->count($post->id)}} Posts</span><br>
                            <a href="/authors/{{$user->id}}/posts"
                               class="mx-1 text-gray-500 hover:underline">View profil
                                of {{ucwords($user->name)}}</a>
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <section class="px-8 mt-10">
        <h3 class="mb-4 text-xl font-bold text-gray-700">Categories</h3>
        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
            <ul>

                @foreach ($aside['categories'] as $category)
                <li class="mb-3"><a href="/categories/{{$category->id}}/posts"
                                    class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">
                    {{ucwords($category->name)}}</a> contains {{$category->posts->count($post->id)}} posts
                </li>
                @endforeach
            </ul>
        </div>
    </section>
   <section class="px-8 mt-10">
       <h3 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h3>
       <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
           <div class="flex items-center justify-center">
               @foreach ($aside['mostRecent']->categories as $category)
               <a href="?action=index&resource=post&category={{$category->slug}}"
                  class="px-2 py-1 text-sm text-green-100 bg-gray-600 rounded hover:bg-gray-500">
                       {{ucwords($category->name)}}
               </a>
               @endforeach
           </div>
           <div class="mt-4">
               <a href="/posts/{{$aside['mostRecent']->id}}"
                  class="font-bold text-lg font-medium text-gray-700 hover:underline">{{$aside['mostRecent']->title}}</a>
           </div>
           <div class="flex items-center justify-between mt-4">
               <div class="flex items-center">
                   <img
                       src="{{$aside['mostRecent']->user->avatar}}"
                       alt="avatar"
                       class="object-cover w-8 h-8 rounded-full">
                   <a href="/authors/{{$aside['mostRecent']->user->id}}/posts"
                      class="font-bold mx-3 text-sm text-gray-700 hover:underline">{{ucwords($aside['mostRecent']->user->name)}}</a>
               </div>
               <span
                   class="text-sm font-light text-gray-600"><?= (new DateTime($aside['mostRecent']->published_at))->format('M j, Y') ?></span>
           </div>
       </div>
   </section>
</aside>
