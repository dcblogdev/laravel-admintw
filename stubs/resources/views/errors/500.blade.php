<x-app-layout>
@section('title', '500')

<h3 class="text-center mt-10">500 - There has been an internal server error.</h3>

@include('errors.messages')

<h4 class="text-center mt-10">{{ $message ?? '' }}</h4>

</x-app-layout>