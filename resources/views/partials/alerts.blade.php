@if(Session::has('success'))

  <div id="alertSuccess" class="alert alert-success alert-position" role="alert">
    <strong>Success:</strong> {{ Session::get('success') }}
  </div>

@endif