<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>User Page</h1>

    <h3>Hi User name is {{ $user['name'] }} </h3>
    <h3>Hi User email is {{ $user['email'] }} </h3>


    @if (true)
    <h6>Hi User name is {{ $user['name'] }}</h6>

    @else
        <h3>user name is not found  </h3>
        
    @endif

   <form action="{{ route('user.raju') }}" method="post">

    @csrf

    @method('get')

    @extends() -> inherit another layout
    @section() -> define a section
    @yield() -> display a section
    @include() -> include a partial file
    @for () -> loop
        
    @endfor
    @foreach ( as ) -> foorm
        
    @endforeach

    @csrf -> add csrf token
    @if () -> condition 
         
    @endif

    @method() -> http method(PUT/DELETE/GET/POST)
    @error() -> Validation error
        
    @enderror

    @isset() ->  check the value set or not
        
    @endisset

    @auth() -> login in user
        
    @endauth

    @guest -> Guest user
        
    @endguest

    @can() -> Permission check
        

    @if($user['role'] == 'admin')

    <a href="{{ URL('/') }}">User</a>

    @else

    <p>you are not admin</p>

    @endif


    @empty -> check the value empty or not

   

   </form>


   <a href="{{ URL('/') }}" class=" {{request()->routels()->getName() == 'index' ? 'active' : ''}} btn btn-primary">Home</a>
</body>
</html>