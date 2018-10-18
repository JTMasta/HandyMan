@extends ('layouts.master')

@section ('content')
<div class="container">
    @if(sizeof($handymen) > 0)
        <h1>List of available {{ $handymen[0]->job_title }}s</h1>
        <p>Note that the <strong>Distance</strong> column is between you and the HandyMan's actual addresses!</p>
        <table class="table">
            <thead>
                <th scope="col">Handyman Title</th>
                <th scope="col">Handyman First Name</th>
                <th scope="col">Handyman City</th>
                <th scope="col">Distance</th>
            </thead>
            <tbody>
                @foreach ($handymen as $handyman)
                    <tr>
                        <td>{{ $handyman->job_title }}</td>
                        <td>{{ $handyman->name }}</td>
                        <td>{{ $handyman->city }}</td>
                        <td>{{ $handyman->distance }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else 
            <h1>Sorry, there are currently no {{ $handyman_title }}s available!</h1>
    @endif
@endsection