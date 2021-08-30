@include('flash::message')

@if (session('message'))
    <div class="alert alert-blue">
        {{ session('messsage') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-green">
        {{ session('success') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-yellow">
        {{ session('status') }}
    </div>
@endif

@if (isset($errors))
    @if (count($errors) > 0)
        <div class="alert alert-red">
            @foreach ($errors->all() as $error)
                {{ $error }}</br>
            @endforeach
        </div>
    @endif
@endif