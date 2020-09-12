@foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach

@if(session()->has('error'))
    <li>{{session('error')}}</li>
@endif