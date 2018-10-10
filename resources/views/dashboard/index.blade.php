@extends ('layouts.master')

@section ('content')
<div class="container">

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
                    <td><a href="/services/{{ $service->id }}/edit">Edit</a></td>
                    <td>
                        <form method="POST" action="/services/{{ $service->id}}">
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