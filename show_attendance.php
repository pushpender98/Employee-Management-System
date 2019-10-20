<?php
include('header.php');


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
					<li class="breadcrumb-item active">Employee Attendance Detail</li>
				</ol>
			</div>
			<div class="content">
				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<div class="content">
								<form  method='post' id="show_attendance" action='show_attendance.php?action=show_attendance'>
									<div class="row">
										<div class="col-md-3"></div>
										<div class="col-md-3">
											<input type="date" class="form-control " name="att_date" id="att_date" required />
										</div>
										<div class="col-md-6">
											<button type="submit"  class=" btn btn-default btn-fill">Show Attendance</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php 
						$con=mysqli_connect('localhost:3306','root','','ems');
						if($_GET){
							// echo 'hello';
							if($_GET['action']=='show_attendance'){
								$att_date=$_POST['att_date'];	
							$sql="select * from ems_attandance where date='$att_date'";		
							$result=mysqli_query($con,$sql);
							}
						
						
						if($result){ ?>
						
					<div class="row">
						<div class="col-md-12">
							<div class="content" id="attendance" style="">	
								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive" >
											<table class="table table-striped ">
												<thead>
													<th>Employee Id</th>
													<th>Employee Name</th>
													<th>Date</th>
													<th>Status</th>
												</thead>
												<tbody>
													<?php 
													
													while($row1=mysqli_fetch_array($result))
													{											
														?>
														<tr  class="warning">
															<td><?php echo $row1['employee_id']; ?></td>
															<td><?php echo $row1['name']; ?></td>
															<td><?php echo $row1['date']; ?></td>
															<td><?php echo $row1['status']; ?></td>														
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
						<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>


<?php
include('footer.php');
?>