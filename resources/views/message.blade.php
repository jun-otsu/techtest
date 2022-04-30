<head>
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
<br>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger" role="alert">
{{ session('error') }}
<br>
</div>
@endif
@foreach ($errors->get('isbn') as $message)
<div class="alert alert-danger" role="alert">
{{ $message }}
</div>
<br>
@endforeach
