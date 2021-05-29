@extends('layouts.app')

@section('title', '404')

@section('content')
<div class="prose">
    <h3>404 - The requested page was not found.</h3>

    @include('errors.messages')
</div>
@stop
