@include('flash::message')

@if (session('message'))
    <div class="">
        {{ session('message') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-green">
        {{ session('success') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif