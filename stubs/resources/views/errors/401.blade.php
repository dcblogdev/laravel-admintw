@extends('layouts.app')

@section('title', '401')

@section('content')

<div class="prose">

    <h3>401 - You do not have the correct permissions.</h3>

    @include('errors.messages')

    <h4>{{ $message }}</h4>

</div>

@stop
