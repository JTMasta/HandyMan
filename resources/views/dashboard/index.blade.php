@extends ('layouts.master')

@section ('content')
<div class="container">
@include ('layouts.flash_msg')
    <br>
    <table class="table">
        <thead>
            <th scope="col">Title</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td class="row">{{ $service->job_title }}</td>
                    <td><a href="/services/{{ $service->id }}/edit" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form method="POST" action="/services/{{ $service->id }}">
                            {{ csrf_field() }}
                            @method ('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection