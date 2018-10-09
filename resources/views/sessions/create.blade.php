@extends ('layouts.master')

@section ('content')
<div class="container">
    <h1>Welcome back</h1>
    <form method="POST" action="/login">
        {{ csrf_field() }}
        @include ('layouts.errors')
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection