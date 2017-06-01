@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="wrap_404">
                        <h3 class="title_404">Sorry</h3>
                        <span class="line_1_404">Your Account is deactivated by admin</span>
                        <br />
                        <span class="line_2_404">
                            Contact teemates@info.com</span>
                        <br />
                        <a href="{{ url('/') }}" class="readon">Home Page</a>
            </div>
        </div>
    </div>
</div>
@endsection
