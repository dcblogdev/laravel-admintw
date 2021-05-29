@extends('layouts.app')

@section('title', '500')

@section('content')

<div class="prose">

    <h3>500 - There has been an internal server error.</h3>

    @include('errors.messages')

    <h4>{{ $message }}</h4>

</div>

@stop
