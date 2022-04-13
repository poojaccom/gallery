
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
 
  <div class="col-md-12">
  
  <h2>{{ $categroy_data->cat_name}}</h2>
  
      <div class="row">
      <?php 

$findgal= App\Models\Admin\Video::where('cat_id',$categroy_data->id)->paginate(12);


foreach($findgal as $value_gal)
{


?>
          <div class="col-md-3">
          <a data-toggle="modal" data-target="#myModaldetail{{$value_gal->id}}"> 
            <div>
          <iframe src="{{$value_gal->link}}"  style="width:100%" ></iframe>
        <h4 class="card-title">{{ $value_gal->title }}</h4>
        </div>
        </a>
    


          </div>
            <!-- modal start here -->
      
  <div class="modal fade" id="myModaldetail{{$value_gal->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
        <iframe src="{{$value_gal->link}}"  style="width:100%" ></iframe>
        </div>
        <!-- <div class="modal-footer"> -->
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- </div> -->
      </div>
      
    </div>
  </div>
       <!-- modal end here -->
          <?php }?>
      </div>

  </div>
  <div> 
        {{ $findgal->links('pagination::bootstrap-4')}} 
        </div>
</div>

</body>
</html>
