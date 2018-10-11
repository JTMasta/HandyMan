@extends ('layouts.master')

@section ('content')
<div class="container">
    @include ('layouts.flash_msg')
    @foreach($services as $service)
        @include ('services.service')
        <br>
    @endforeach
</div>
@endsection
