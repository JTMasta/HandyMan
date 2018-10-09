@extends ('layouts.master')

@section ('content')
    @foreach($services as $service)
        @include ('services.service')
        <br>
    @endforeach
@endsection
