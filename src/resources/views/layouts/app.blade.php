<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="lang" content="{{ App::getLocale() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ assetUrl('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
    @yield('links')
    <!-- Scripts -->
    <script>
    window.Laravel = {!!json_encode([
            'csrfToken' => csrf_token(),
            'lang' => App::getLocale(),
            'user' => auth()->user(),
        ]) !!};
    window.storageUrl = '{{ getStorageUrl() }}';
    window.user = {!!json_encode(auth()->user()) !!};
    

    </script>
</head>

<body>
    <div id="app">
        @include('layouts.partials.nav') 
        @yield('content')
    </div>
    @include('layouts.partials.footer') 

    @yield('scripts')
        @if (auth()->check())
            <script>
                    console.log('hello')
                    $(function(){
                        $('#notification').on('click', function(){
                            axios.get('/notification/mark/read')
                        })
                    })
            </script>
        @endif
    
</body>

</html>
