@extends ('layouts.master')

@section ('content')
@include ('layouts.flash_msg')
    @foreach($services as $service)
        @include ('services.service')
        <br>
    @endforeach
@endsection
