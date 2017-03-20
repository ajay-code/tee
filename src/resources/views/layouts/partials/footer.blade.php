 <!-- Scripts -->
<script src="{{ assetUrl('js/app.js') }}"></script>


@include('sweet::alert')

@if (Auth::check())
    @if (!Auth::user()->terms_accepted)
        @includeif('layouts.partials.models.acceptterms')
    @endif
@endif

