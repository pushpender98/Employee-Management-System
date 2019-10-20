<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
body {
	color: #fff;
	background-image:url(image/background.jpg);
	background-repeat:repeat;
}
</style>
</head>
<body>
<div class="login-form">
    <form method="post" id="login">
		<div class="avatar">
			<img src="image/avatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">Dashboard Login</h2>   
        <div class="form-group">
        	<input type="email" class="form-control" name="username" placeholder="username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
			<p id="error"></p>
        </div>
		<div class="clearfix">
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>
		<p id="p"></p>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
 $("#login").validate({
        rules:{
            email:{
                required:true,
            },
            password:{
                required:true,
            }
        },
        messages:{
            email:{
                required: "Please enter your email.",
            },
            password:{
                required: "Please enter Password",
            }
        },

    submitHandler: function(form) {
       
      $.ajax({
        type:"POST",
        url: "mysql_query.php?action=login",
        data: $("#login").serialize(),
        beforeSend: function(){
        },
        success: function(response){
			 if(response == 1){
				window.location.href="dashboard.php";
			   
				// setTimeout(function(){ location.reload(); }, 2000); 
			 }
			   if(response == '2'){
				  $('#error').html("Incorrect Password or Username");
			  // }else{
				// swal("something error with server! Please try again.");
			   }
        }
      });
      }
     
    }); 
</script>
</body>
</html>   
                         