@component('mail::message')
    <b>You have successfully archived your post!</b>
    @component('mail::button', ['url' => route('posts.show', [
        'post' => $post,
        'category' => $post->category
    ])])
        Show post
    @endcomponent
    Thanks, {{ config('app.name') }}
@endcomponent
