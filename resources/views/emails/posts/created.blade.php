<x-mail::message>
# It require your attention

A new post has been created !

<x-mail::button :url="'http://test.test/posts/'. $post->slug">
Visit {{$post->title}}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
