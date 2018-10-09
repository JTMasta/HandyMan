@extends ('layouts.master')

@section ('content')
<div class="container">
    <form method="POST" action="/services/{{ $service->id}}">
        
        {{ csrf_field() }}
        @method ('PATCH')

        <h2>Edit Handyman Service</h2><hr>
        @include ('layouts.errors')
        <div class="form-group">
            <label for="jobtitle">HandyMan title:</label>
            <input type="text" value="{{ $service->job_title }}" class="form-control" id="jobtitle" placeholder="Electrician" name="job_title">
        </div>
        <div class="form-group">
                <label for="experience">Years of experience:</label>
                <input type="text" value="{{ $service->nb_yrs_exp }}" class="form-control" id="experience" name="nb_yrs_exp">
            </div>
        <div class="form-group">
            <label for="body">Description</label>
            <textarea class="form-control" id="body" name="body">{{ $service->body }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Handyman</button>
        </div>
    </form>
</div>
@endsection