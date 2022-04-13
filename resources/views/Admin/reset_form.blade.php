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
  <h2>Reset password</h2>
  <form action="{{ route('update.pass')}}" method="post">
  {{ csrf_field() }}
  <input type="hidden" class="form-control" value="{{$admin_data->reset_token}}"  value="" name="reset_token">
    <div class="form-group">
      <label for="email">New Password:</label>
      <input type="password" class="form-control" id="first"  placeholder="Enter Password" name="new_pass" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="second" placeholder="Enter Confirm password" name="confirm_pass" required>
    </div>
    
    <button type="submit"   class="btn btn-default chk">Submit</button>
  </form>
</div>

    <!-- <script>
function matchPassword() {
  var pw1 = $('#first').val();
  var pw2 =  $('#second').val();
  if(pw1 != pw2)
  {	
  	alert("Passwords did not match");
  } else {
    event.preventDefault();
  	alert("Password created successfully");
  }
}
</script> -->

    <script>
        $(document).on('click','.chk', function(e){
            

            var pw1 = $('#first').val();  
  var pw2 =  $('#second').val();
 
     
  if (pw1 == ""){
        alert("please enter password");
      }else if (pw2 == "") 
             {
                 alert("please enter confirm password");
             }else if(pw1 != pw2)
             {	
                event.preventDefault();
  	            alert("Passwords did not match");
                window.location.reload(true);
              } else {
    
  	             alert("Password created successfully");
                 
              }

        });
    </script>

</body>
</html>
