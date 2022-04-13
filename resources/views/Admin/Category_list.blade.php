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
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="{{asset('Assets/Admin/style.css')}}">

</head>
<body>

<div class="container">
  <h2>Category</h2>
  <div style="text-align: right; margin: 10px;">
  <a href="{{ route('add.category')}}"><button type="button" class="btn btn-default">Add Category</button></a>
</div>
           
 
 
  
  <form action="{{ route('category.save_priority') }}" method="post">
    {{ csrf_field() }}
  <ul>
    @foreach ($cat_data_order as $item)
        

    <li class="draggable" draggable="true">{{ $item->cat_name }}
    <input type="hidden" name="priority[]" value="{{ $item->id }}">
    <span>
            <a href="{{ route('category.editpage',['id'=>$item->id]) }}">
                <i class="fa fa-pencil" style="color:green;" aria-hidden="true"></i> 
            </a>
        </span>
        <span>
          <i class="fa fa-trash" data-toggle="modal" data-target="#myModal{{$item->id }}" style="color:red;" aria-hidden="true"></i>
        </span>
    </li> 

    <!-- Modal stat here -->
  <div class="modal fade" id="myModal{{$item->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete</h4>
        </div>
        
        <div class="modal-body">
            <input type="hidden" value="{{$item->id }}" name="id">
          <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
        <a href="{{ route('category.delete',['id'=>$item->id]) }}">
            <button type="submit">Yes</button>
        </a>
      
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
        
      </div>
      
    </div>
  </div>
  <!-- ---------------modal end here -->
    @endforeach    
  
  </ul>
<input type="submit" class="btn btn-success" value="save">
</form>
</div>
<script  src="{{asset('js/Admin/function.js')}}"></script>

</body>
</html>
