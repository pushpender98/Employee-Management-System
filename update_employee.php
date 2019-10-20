<?php
$id=$_GET['id'];
if($id==''){
	header('Location:dashboard.php');
}
include('header.php');

$con=mysqli_connect('localhost:3306','root','','ems');

$sql="select * from ems_employee where employee_id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="content">
	<div class="container-fluid">
		<div class="card">
			<!-- Breadcrumbs-->
			<div class="header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">
						<a href="dashboard.php">Dashboard</a>
					</li>
					<li class="breadcrumb-item"><a href="employee_details.php">Show Employee Details</a></li>
					<li class="breadcrumb-item active">Update Employee Details</li>
				</ol>
			</div>
			
			<div class="content">
				<div class="row">					
					<form method="post" id="update_employee_profile">	
						<div class="col-md-12">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="exampleInputName">First name</label>
										<input class="form-control" name="firstname" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" value="<?php echo $row['first_name']; ?>">
									</div>
									<div class="col-md-6">
										<label for="exampleInputLastName">Last name</label>
										<input class="form-control" name="lastname" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" value="<?php echo $row['last_name']; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="exampleInputEmail1">Email address</label>
										<input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['email']; ?>">
									</div>
									<div class="col-md-6">
										<label for="exampleGender" >Gender</label>
										<div class="form-control" style="border:none;">
										<input value="male"  type="radio" name="gender"  <?php if($row['gender']=="male"){echo "checked";}?>/>Male &nbsp  &nbsp 
										<input <?php if($row['gender']=="female"){echo "checked";}?> type="radio" name="gender" value="female"/>Female
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="exampleMobile">Mobile</label>
										<input class="form-control" name="mobile" id="exampleMobile" type="text"  placeholder="Enter Mobile Number" value="<?php echo $row['mobile_no']; ?>">
									</div>
									<div class="col-md-6">
										<label for="examplephone">Home Phone</label>
										<input class="form-control" name="phone" id="examplephone" type="text"  placeholder="Enter Phone Number" value="<?php echo $row['phone_no']; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-8">
										<label for="exampleAddress">Address</label>
										<input class="form-control" name="address" id="exampleAddress" type="text"  placeholder="Enter Address" value="<?php echo $row['address']; ?>">
									</div>
									<div class="col-md-4">
										<label for="examplePincode">Pincode</label>
										<input class="form-control" name="pincode" id="examplePincode" type="text"  placeholder="Enter Pincode" value="<?php echo $row['pincode']; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="exampleCity">City</label>
										<input class="form-control" name="city" id="exampleCity" type="text"  placeholder="Enter City" value="<?php echo $row['city']; ?>">
									</div>
									<div class="col-md-4">
										<label for="exampleDOB">Date Of Birth</label>
										<input class="form-control" name="dob" id="exampleDOB" type="date" value="<?php echo $row['date_of_birth']; ?>">
									</div>
									<div class="col-md-4">
										
									</div>
								</div>
							</div>
							<div class="form-group" style="left:10px;">
								<div class="row" >
									<div class="col-md-12">
										<label for="examplebio">Description</label>
										<textarea class="form-control" id="bio" name="bio"><?php echo $row['bio']; ?></textarea>
									</div>
								</div>
							 </div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-5"></div>									
									<div class="col-md-4"></div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary btn-xm btn-fill btn-block">Update Employee</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
	$("#update_employee_profile").validate({
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
			mobile:{
				required:true,
				minlength:10,
				maxlength:10,
			},
			phone:{
				required:true,
				minlength:10,
				maxlength:10,
			},
			address:{
				required:true,
			},
			pincode:{
				required:true,
				minlength:6,
				maxlength:6
			},
			city:{
				required:true,
			},
			dob:{
				required:true,	
			},
			bio:{
				required:true,
			}
			
		},
        messages:{
           firstname:{
                required: "Please enter First name.",
            },
            lastname:{
                required: "Please enter  Last name.",
            },
			email:{
                required: "Please enter  Email.",
			},
			gender:{
                required: "Please Select  Gender.",
			},
			mobile:{
                required: "Please enter  Mobile.",
			},
			phone:{
                required: "Please enter  Phone.",
			},
			address:{
                required: "Please enter  Address.",
			},
			pincode:{
                required: "Please enter  Pincode.",
			},
			city:{
                required: "Please enter  City.",
			},
			dob:{
                required: "Please enter Date of Birth.",
			},
			bio:{
                required: "Please enter Description.",
			}
        },

		submitHandler: function(form) {
       
			$.ajax({
				type:"POST",
				url: "mysql_query.php?action=update_employee&id=<?php echo $id?>",
				data: $("#update_employee_profile").serialize(),
				beforeSend: function(){
				},
				success: function(response){
					if(response == 1){
						window.location.href="employee_details.php";
						
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

<?php
include('footer.php');
?>