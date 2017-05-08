@extends('layouts.app')

@section('content')
    @include('message.partials.flash')

    @each('message.partials.thread', $threads, 'thread', 'message.partials.no-threads')
@stop