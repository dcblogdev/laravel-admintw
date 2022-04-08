<x-app-layout>
@section('title', '401')

<h3>401 - You do not have the correct permissions.</h3>

@include('errors.messages')

<h4>{{ $message ?? '' }}</h4>
    
</x-app-layout>
