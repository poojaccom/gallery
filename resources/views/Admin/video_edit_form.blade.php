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
  <h2>Edit Form</h2>
  <form action="{{ route('update.video') }}" method="post">
      {{ csrf_field() }}
    <div class="form-group">
      <!-- <label>Ttile:</label> -->
      <input type="hidden" class="form-control" id="title" value="{{ $video_data_edit->id}}"  placeholder="Enter title" name="id"> 
      <label>Ttile:</label>
      <input type="title" class="form-control" id="title" value="{{ $video_data_edit->title}}"  placeholder="Enter title" name="title">
      <label>Link:</label>
      <input type="title" class="form-control" id="title" value="{{ $video_data_edit->link}}"  placeholder="Enter title" name="link">
      <label>category:</label>
      
                     <select name="cat_id" class="form-control">
                     
                     <option value="">Select</option>
                     <?php

                     //$cat_data = Video::get();
                     $findgal= App\Models\Admin\Category::get();  
                     foreach ($findgal as $value_hfd) {
                        ?>
                                 <option value="{{ $value_hfd->id }}" @if($value_hfd->id == $video_data_edit->cat_id)
                   selected
                    @endif
                    >{{ $value_hfd->cat_name }}</option>
           <?php } ?>
                    </select>
      
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
