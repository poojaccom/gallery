<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>video</h2>
  <div style="text-align: right; margin: 10px;">
  <a href="{{ route('add.video')}}"><button type="button" class="btn btn-default">Add Video</button></a>
</div>
           
  <table class="table table-bordered">
    <thead>
       
      <tr>
      <th>Id</th>
        <th>Category Name</th> 
        <th>Video Title</th> 
        <th>Video Link</th> 
       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
        foreach($video_data  as $value)  
        {
           
           $findgal= App\Models\Admin\Category::where('id',$value->cat_id)->get();
          foreach($findgal  as $value_gal)  
        {
            
        
        ?>
      <tr>
        <td>{{$value->id }}</td>
        <td>{{$value_gal->cat_name }}</td>
        <td>{{$value->title }}</td>
        <td>{{$value->link }}</td>
       
        <td><span>
            <a href="{{ route('video.editpage',['id'=>$value->id]) }}">
                <i class="fa fa-pencil" style="color:green;" aria-hidden="true"></i>
            </a>
        </span>
        <span><i class="fa fa-trash" data-toggle="modal" data-target="#myModal{{$value->id }}" style="color:red;" aria-hidden="true"></i></span>
    </td>
        
      </tr>

       <!-- Modal stat here -->
  <div class="modal fade" id="myModal{{$value->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete</h4>
        </div>
        
        <div class="modal-body">
            <input type="hidden" value="{{$value->id }}" name="id">
          <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
        <a href="{{ route('video.delete',['id'=>$value->id]) }}">
            <button type="submit">Yes</button>
        </a>
      
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
        
      </div>
      
    </div>
  </div>
  <!-- ---------------modal end here -->
      <?php } } ?> 
     
    </tbody>
  </table>
  {{ $video_data->links('pagination::bootstrap-4')}} 
</div>

</body>
</html>
