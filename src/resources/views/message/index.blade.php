@extends('layouts.app')

@section('content')
    @include('message.partials.flash')
	
	<div class="col-md-6 col-md-offset-3">
    	@each('message.partials.thread', $threads, 'thread', 'message.partials.no-threads')
    </div>
@stop