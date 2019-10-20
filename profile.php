<?php
include('header.php');

$con=mysqli_connect('localhost:3306','root','','ems');
$userid= $_SESSION['employee_id'];
$sql="select * from ems_hr_profile where employee_id=$userid";
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
					<li class="breadcrumb-item active">Profile</li>
				</ol>
			</div>
			<div class="content">
				<div class="card">
					<div class="row">					
						<form method="post" id="">	
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="exampleInputName">First name</label>
											<input class="form-control" name="firstname" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" value="<?php echo $row['first_name']; ?>" disabled>
										</div>
										<div class="col-md-6">
											<label for="exampleInputLastName">Last name</label>
											<input class="form-control" name="lastname" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" value="<?php echo $row['last_name']; ?>" disabled>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="exampleInputEmail1">Email address</label>
											<input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['email']; ?>" disabled>
										</div>
										<div class="col-md-6">
											<label for="exampleInputPassword1">Password</label>
											<input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password" value="<?php echo $row['password']; ?>" disabled>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="exampleMobile">Mobile</label>
											<input class="form-control" name="mobile" id="exampleMobile" type="text"  placeholder="Enter Mobile Number" value="<?php echo $row['mobile']; ?>" disabled>
										</div>
										<div class="col-md-6">
											<label for="exampleMobile">Home Phone</label>
											<input class="form-control" name="phone" id="examplePhone" type="text"  placeholder="Enter Phone Number" value="<?php echo $row['phone']; ?>" disabled> 
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-8">
											<label for="exampleAddress">Address</label>
											<input class="form-control" name="address" id="exampleAddress" type="text"  placeholder="Enter Address" value="<?php echo $row['address']; ?>" disabled>
										</div>
										<div class="col-md-4">
											<label for="examplePincode">Pincode</label>
											<input class="form-control" name="pincode" id="examplePincode" type="text"  placeholder="Enter Pincode" value="<?php echo $row['pincode']; ?>" disabled>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-4">
											<label for="exampleCity">City</label>
											<input class="form-control" name="city" id="exampleCity" type="text"  placeholder="Enter City" value="<?php echo $row['city']; ?>" disabled>
										</div>
										<div class="col-md-4">
											<label for="exampleDOB">Date Of Birth</label>
											<input class="form-control" name="dob" id="exampleDOB" type="date" value="<?php echo $row['dob']; ?>" disabled>
										</div>
										<div class="col-md-4">
											<label for="exampleGender">gender</label>
											<input class="form-control" name="gender" id="exampleGender" type="text"  placeholder="Enter Gender" value="<?php echo $row['gender']; ?>" disabled>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-4"></div>									
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<a href="update_hr.php" type="submit" class="btn btn-primary btn-lg btn-block">Update Profile</a>
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
</div>
<br>
<?php
include('footer.php');
?>