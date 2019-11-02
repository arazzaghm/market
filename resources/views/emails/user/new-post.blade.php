@component('mail::message')
    <b>New post created</b>
    @component('mail::button', ['url' => route('posts.show', [
        'post' => $post,
        'category' => $post->category
    ])])
        Show post
    @endcomponent
    Thanks, {{ config('app.name') }}
@endcomponent
