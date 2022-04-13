{{-- @extends('layouts.client') --}}


    
    {{-- @section('content') --}}
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <form method="POST" action="{{ route('admin.save') }}" > 
        {{ csrf_field() }}
<label>Name:
</label>
<input type="text" class="form-control" name="admin_name" required><br> 
<label>Email:
</label>
<input type="email" class="form-control" name="admin_email" required><br>
<label>Password:
</label>
<input type="password" class="form-control" name="admin_password" required><br>  
<button type="submit">register</button>
    </form>
<a href="{{ route('admin.login')}}">alredy register 
    </a>

    </div>
</body>
</html>
{{-- @endsection --}}
