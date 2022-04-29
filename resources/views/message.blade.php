@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
<br>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
{{ session('error') }}
<br>
</div>
@endif
@foreach ($errors->get('isbn') as $message)
{{ $message }}
<br>
@endforeach
