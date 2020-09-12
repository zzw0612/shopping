@if($errors->any())
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif

@if(session()->has('error'))
    <li>{{ session('error') }}</li>
@endif