@component('mail::message')

{{ $from->name }} liked on your post
click the button to visit the post
@component('mail::button', ['url' => url('posts') . '/' . $post->id ])
Visit post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
