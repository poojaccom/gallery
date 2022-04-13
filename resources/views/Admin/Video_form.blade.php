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
  <h2>Add Video</h2>
  <form action="{{ route('save.video') }}" method="post">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Ttile:</label>
      <input type="title" class="form-control" id="title" placeholder="Enter title" name="title" required>
    </div>
    <div class="form-group">
        <label for="email">link:</label>
        <input type="title" class="form-control" id="title" placeholder="Enter title" name="link" required>
      </div>

      <div class="form-group">
                  <select name="cat_id" required>
                     
                      <option value="">Select</option>
                      <?php

                      //$cat_data = Video::get();
                      foreach ($cat_data as $value) {
                        
                      
                      
                      ?>
                                  <option value="{{ $value->id }}">{{ $value->cat_name }}</option>
            <?php } ?>
                     </select>
        
      </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
