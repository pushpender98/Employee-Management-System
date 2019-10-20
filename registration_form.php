<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registration Form</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  
  <style>
body {
	color: #fff;
	background-image:url(image/background.jpg);
	background-repeat:repeat;
}
</style>

</head>

<body>
<div class="container">
	<div class="card card-register mx-auto mt-5">
		<div class="card-header" style="color:black;"><b>Register an Account</b></div>
			<div class="card-body" style="color:black;">
				<form method="post" id="register">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="exampleInputName">First name</label>
								<input class="form-control" name="firstname" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
							</div>
							<div class="col-md-6">
								<label for="exampleInputLastName">Last name</label>
								<input class="form-control" name="lastname" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="exampleInputPassword1">Password</label>
								<input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
							</div>
							<div class="col-md-6">
								<label for="exampleConfirmPassword">Confirm password</label>
								<input class="form-control" id="exampleConfirmPassword" name="cnfpassword" type="password" placeholder="Confirm password">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="examplemobile">Mobile</label>
								<input class="form-control" id="examplemobile" name="mobile" type="text" placeholder="Mobile Number">
							</div>
							
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
				</form>
			</div>
			<p style="color:red"></p>
	</div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
	$("#register").validate({
        rules:{
            firstname:{
                required:true,
            },
            lastname:{
                required:true,
            },
			email:{
				required:true,
			},
			password:{
				required:true,
			},
			cnfpassword:{
				required:true,
				equalTo:"#exampleInputPassword1"
			},
			mobile:{
				required:true,
				minlength:10,
				maxlength:10
			}
			
		},
        messages:{
           firstname:{
                required: "Please enter your first name.",
            },
            lastname:{
                required: "Please enter your last name.",
            },
			email:{
                required: "Please enter your email.",
			},
			password:{
                required: "Please enter your password.",
			},
			cnfpassword:{
                required: "Please enter your correct password.",
			},
			mobile:{
                required: "Please enter your correct Mobile Number.",
			}
        },

		submitHandler: function(form) {
       
			$.ajax({
				type:"POST",
				url: "mysql_query.php?action=register",
				data: $("#register").serialize(),
				beforeSend: function(){
				},
				success: function(response){
					if(response == 1){
						window.location.href="login.php";
						
						// setTimeout(function(){ location.reload(); }, 2000); 
				   }
				  // else if(response == 'field'){
					  // swal("All field Required!");
				  // }else{
					// swal("something error with server! Please try again.");
				  // }
				}
			});
        }
     
    }); 
</script>

</body>

</html>
