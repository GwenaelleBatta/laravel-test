@foreach($posts as $post)
    <article class="mt-6">
        <div class="flex flex-col max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
            <div>
                <livewire:article-post :post="$post"/>
            </div>
    </article>
@endforeach
