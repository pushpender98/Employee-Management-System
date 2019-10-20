<?php
include('header.php');
$con=mysqli_connect('localhost:3306','root','','ems');
$sql="select * from ems_salary";
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
					<li class="breadcrumb-item active">Show Salary Details</li>
				</ol>
			</div>
			<div class="content">
				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<div class="content">								
								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-striped ">
												<thead>
													<th>Id</th>
													<th>Name</th>
													<th>basic_pay</th>
													<th>da</th>
													<th>hra</th>
													<th>PF</th>
													<th>total salary</th>
													<th>total days</th>
													<th>working days</th>
													<th>paid leave</th>
													<th>absent days</th>
													<th>present days</th>
													<th>month</th>
													<th>net salary</th>
													<th>Remove</th>
													
												</thead>
												<tbody>
													<?php while($row=mysqli_fetch_array($result))
													{											
														?>
														<tr  class="warning">
															<td><?php echo $row['employee_id']; ?></td>
															<td><?php echo $row['name']; ?></td>
															<td><?php echo $row['basic_pay']; ?></td>
															<td><?php echo $row['da']; ?></td>
															<td><?php echo $row['hra']; ?></td>
															<td><?php echo $row['pf']; ?></td>
															<td><?php echo $row['total_salary']; ?></td>
															<td><?php echo $row['total_days']; ?></td>
															<td><?php echo $row['working_days']; ?></td>
															<td><?php echo $row['paid_leave']; ?></td>
															<td><?php echo $row['absent_days']; ?></td>
															<td><?php echo $row['present_days']; ?></td>
															<td><?php echo $row['month']; ?></td>
															<td><?php echo $row['net_salary']; ?></td>	
															<td><a href="mysql_query.php?action=remove_salary&id=<?php echo $row['sno']; ?>">remove</a></td>
															
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
	</div>
</div>
<?php
include('footer.php');
?>