<?php
include('header.php');
$con=mysqli_connect('localhost:3306','root','','ems');

$sql="select * from ems_leave";
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
					<li class="breadcrumb-item active">Leave Details</li>
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
													<th>Employee Id</th>
													<th>Employee Name</th>
													<th>Leave Start</th>
													<th>Leave End</th>													
													<th>Leave Type</th>													
													<th>Leave Type (Paid / Unpaid)</th>														
													<th>Leave Days</th>														
												</thead>
												<tbody>
													<?php while($row=mysqli_fetch_array($result))
													{		
													$start  = strtotime($row['leave_start']);
													$end    = strtotime($row['leave_end']);
													$datediff = $end - $start;
													$totalDays = round($datediff / (60 * 60 * 24))+1;												
														?>
														<tr>
															<td><?php echo $row['employee_id']; ?></td>
															<td><?php echo $row['name']; ?></td>
															<td><?php echo $row['leave_start']; ?></td>
															<td><?php echo $row['leave_end']; ?></td>
															<td><?php echo $row['leave_type']; ?></td>
															<td><?php echo $row['leave_paid']; ?></td>
															<td><?php echo $totalDays; ?></td>
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