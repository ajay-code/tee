<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>
    <!-- Styles -->
    <link href="{{ assetUrl('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ assetUrl('css/admin.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
    @include('admin.layout.partials.nav')
    <div id="app">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ assetUrl('/js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
