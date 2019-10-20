<?php
include('header.php');

$con=mysqli_connect('localhost:3306','root','','ems');
$userid= $_SESSION['employee_id'];
$sql="select * from ems_employee";
$result=mysqli_query($con,$sql);

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
					<li class="breadcrumb-item active">Show Employee Details</li>
				</ol>
			</div>
			<div class="content">
				<div class="row">					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped ">
										<thead>
											<th>Employee Id</th>
											<th>First name</th>
											<th>Email</th>
											<th>Gender</th>
											<th>Mobile Number</th>
											<th>Phone Number</th>
											<th>Address</th>
											<th>Pincode</th>
											<th>City</th>
											<th>Date of birth</th>
											<th>Description</th>
											<th>Remove</th>
											<th>edit</th>
										</thead>
										<tbody>
											<?php while($row=mysqli_fetch_array($result))
											{											
												?>
												<tr>
													<td><?php echo $row['employee_id']; ?></td>
													<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
													<td><?php echo $row['email']; ?></td>
													<td><?php echo $row['gender']; ?></td>
													<td><?php echo $row['mobile_no']; ?></td>
													<td><?php echo $row['phone_no']; ?></td>
													<td><?php echo $row['address']; ?></td>
													<td><?php echo $row['pincode']; ?></td>
													<td><?php echo $row['city']; ?></td>
													<td><?php echo $row['date_of_birth']; ?></td>
													<td><?php echo $row['bio']; ?></td>
													<td><a href="mysql_query.php?action=remove&id=<?php echo $row['employee_id']; ?>">remove</a></td>
													<td><a href="update_employee.php?action=edit&id=<?php echo $row['employee_id']; ?>">edit</a></td>
												</tr>
												<?php 
											} 
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>

<?php
include('footer.php');
?>