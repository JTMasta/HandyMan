@extends ('layouts.master')

@section ('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div class="container">
    <form method="GET" action="/handyman/results">
        <div class="form-group">
            <label for="job_title">Enter HandyMan you wish to search</label>
            <input type="text" name="job_title" class="form-control" id="job_title">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>
</body>
</html>
@endsection