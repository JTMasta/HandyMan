@extends ('layouts.master')

@section ('content')
<div class="container">
    <h1>List of available {{ $handymen[0]->job_title }}s</h1>
      <table class="table">
          <thead>
              <th scope="col">Handyman Title</th>
              <th scope="col">Handyman City</th>
              <th scope="col">Distance</th>
          </thead>
          <tbody>
              @foreach ($handymen as $handyman)
                  <tr>
                      <td>{{ $handyman->job_title }}</td>
                      <td>{{ $handyman->city }}</td>
                      <td>{{ $handyman->distance }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
@endsection