@extends('layouts.app')

@section('content')
    <div class="container" id="wall">
         <div class="row">
            <div class="col-md-3">
                @include('user.sidebar')
            </div><!-- End Of col 3 -->
        
            <div class="col-md-6">
                    @include('posts.posts')
            </div> <!-- End Of col 7 -->
            <div class="col-md-3 fix-chatlist">
                @include('posts.partials.chatlist')
            </div>
        </div><!-- End Of Row -->
    </div> <!-- End Of Container -->
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