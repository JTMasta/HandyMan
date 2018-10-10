<div class="container">
    <div class="card card-body bg-light">
        <div class="form-group">
            <h2>Handyman title: <a href="/services/{{ $service->id }}">{{ $service->job_title }}</a></h2>
            <h3>Years of experience: {{ $service->nb_yrs_exp}}</h3>
            <p>Created at {{ $service->created_at->toFormattedDateString() }}</p>
            <p><strong>Description:</strong></p>{{ $service->body }}
        </div>
    </div>
</div>