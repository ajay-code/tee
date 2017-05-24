@component('mail::message')

{{ $from->name }} commented on your post
click the button to visit the post
@component('mail::button', ['url' => url('posts') . '/' . $post->id ])
Visit post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
