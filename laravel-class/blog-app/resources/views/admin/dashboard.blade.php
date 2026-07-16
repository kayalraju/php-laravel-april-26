<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h1>Hi.... {{ auth()->guard('admin')->user()->name }} </h1>

     <li class="nav-item mt-5">
                <form method="POST" action="{{ route('admin.logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
              </a>

            </li>
</body>
</html>