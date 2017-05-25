
<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{assetUrl('ad/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- styles -->
    <link href="{{assetUrl('ad/css/styles.css')}}" rel="stylesheet">
    <link href="{{assetUrl('ad/css/admin.css')}}" rel="stylesheet">
    <link href="{{assetUrl('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{assetUrl('ad/css/new.css')}}" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        window.storageUrl = '{{ getStorageUrl() }}';
        window.user = {!!json_encode(auth()->user()) !!};
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('admin.layouts.partials.header')

<div class="page-content">
    <div class="row">
        @include('admin.layouts.partials.sidebar')
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>
</div>

<footer>
    <div class="container">

        <div class="copy text-center">
            dashboard||admin
        </div>

    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{assetUrl('js/jquery.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js" async></script>
<script src="{{assetUrl('ad/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{assetUrl('ad/js/custom.js')}}"></script>
<script src="{{assetUrl('js/admin.js')}}"></script>
@yield('scripts')
</body>
</html>
