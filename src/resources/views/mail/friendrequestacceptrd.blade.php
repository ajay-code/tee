@component('mail::message')
{{ $from->name }} accepted your friend request

@component('mail::button', ['url' => route('other.user.profile', ['user' => $from->id])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
