@if (session('status'))
    <div class="alert alert-yellow">
        {{ session('status') }}
    </div>
@endif