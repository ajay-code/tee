@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="row">
            <div class="col-md-3">
                @include('other.user.sidebar')
            </div>
        
            <div class="col-md-6">
                @if ($user->settings->can_view_posts == 'everyone')
                    <posts-url :url="'/api/users/{{ $user->id }}/posts/'"></posts-url>   
                @elseif ($user->settings->can_view_posts == 'friends')
                    @if ($user->isFriendWith(Auth::user()))
                        <posts-url :url="'/api/users/{{ $user->id }}/posts/'"></posts-url>   
                    @endif
                @else
                    <h3 class="text-center">This profile is Private</h3>
                @endif
            </div> <!-- End Of col -->
            <div class="col-md-3 fix-chatlist">
                @include('posts.partials.chatlist')
            </div>
        </div> <!-- End Of Row -->
    </div>
@endsection

@section('scripts')
<script>
    $('#status').on('change', function (){
        if($('#status').is(':checked')){
            axios.get('/settings/online').then(res => {
                $('.chatlist').removeClass('opacity-2');
            })
        }else{
            axios.get('/settings/offline').then(res => {
                $('.chatlist').addClass('opacity-2');
            })

        }
    });
    setInterval(()=>{
        axios.get('/chatlist').then(res => {
            $('#chatlist').html(res.data);
        })
    },180000)
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop

@section('links')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop