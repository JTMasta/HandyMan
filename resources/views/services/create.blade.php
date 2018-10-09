@extends ('layouts.master')

@section ('content')
<div class="container">
    <form method="POST" action="/services">
            {{ csrf_field() }}

        <h2>New Handyman Service</h2><hr>
        @include ('layouts.errors')
        <div class="form-group">
            <label for="jobtitle">HandyMan title:</label>
            <input type="text" class="form-control" id="jobtitle" placeholder="Electrician" name="job_title">
        </div>
        <div class="form-group">
                <label for="experience">Years of experience:</label>
                <input type="text" class="form-control" id="experience" name="nb_yrs_exp">
            </div>
        <div class="form-group">
            <label for="body">Description</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Handyman</button>
        </div>
    </form>
</div>
@endsection