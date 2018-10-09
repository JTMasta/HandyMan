@extends ('layouts.master')

@section ('content')
<div class="container">
        <div class="form-group">
            <h2>Handyman title: {{ $service->job_title }}</h2>
            <h3>Years of experience: {{ $service->nb_yrs_exp}}</h3>
            <p>{{ $service->created_at->toFormattedDateString() }}</p>
            <p><strong>Description:</strong></p>{{ $service->body }}
            <hr>
        </div>
    </div>
@endsection