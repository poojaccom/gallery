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
  <h2>Add Category :</h2>
  <form action="{{ route('save.category') }}" method="post">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Title:</label> 
      <input type="title" class="form-control" id="title" placeholder="Enter title" name="cat_name" required>
    </div>
    <div class="form-group">
      <label>Priority:</label> 
      <input type="title" class="form-control" id="title" placeholder="Enter title" name="priority" required>
    </div>
   
    
    <button type="submit" class="btn btn-default">Submit</button>   
  </form>
</div>

</body>
</html>
