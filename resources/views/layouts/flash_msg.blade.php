@if ($flash = session('message'))
  <br>
  <div class="alert alert-success" role="alert">
    {{ $flash }}
  </div>
@endif