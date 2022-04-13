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
  <h2>Edit Category</h2>
  <form action="{{ route('update.category') }}" method="post">    
      {{ csrf_field() }}
    <div class="form-group">
      <label>Ttile:</label>
      <input type="hidden" class="form-control" id="title" value="{{ $cat_data_edit->id}}"  placeholder="Enter title" name="id">
      <input type="title" class="form-control" id="title" value="{{ $cat_data_edit->cat_name}}"  placeholder="Enter title" name="cat_name">
    </div>

    <div class="form-group">
      <label>Priority:</label> 
      <input type="title" class="form-control" id="title" value="{{ $cat_data_edit->priority}}" placeholder="Enter title" name="priority">
    </div>
   
   

    
   
    
    <button type="submit" class="btn btn-default">Submit</button> 
  </form>
</div>

</body>
</html>
