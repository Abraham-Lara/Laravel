@if ($errors->any())
@foreach ($errors->all() as $error)
<ul>
  <li style="color: crimson">{{$error}}</li>
 </ul>       

@endforeach
    
@endif

