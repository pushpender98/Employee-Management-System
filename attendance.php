<?php
include('header.php');
$con=mysqli_connect('localhost:3306','root','','ems');
$sql="select * from ems_employee";
$result=mysqli_query($con,$sql);
$result1=mysqli_query($con,$sql);
$result2=mysqli_query($con,$sql);

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
					<li class="breadcrumb-item active">Employee Attendance</li>
				</ol>
			</div>
			<div class="content">
				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<div class="content">
								<form  method='post' id="attendance">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-striped ">
													<thead>
														<th>Employee Id</th>
														<th>Employee Name</th>
														<th>Date</th>
														<th>
															<div class="checkall" style="background:none; border:none;">
																<input id="removeabsent" type="radio" value="present"  name="check"/>Present &nbsp &nbsp  &nbsp
																<input id="removepresent"type="radio" value="absent" name="check" checked/>Absent
															</div>		
														</th>
														
													</thead>
													<tbody>
													<?php while($row=mysqli_fetch_array($result))
														{											
															?>
														<tr>
															<td> <input type="text" class="form-control" style="background:none; border:none;" name="<?php echo $row['employee_id'];?>" id="emp_id" value="<?php echo $row['employee_id'];?>" />
															</td>
															<td> <input class="form-control" type="text" style="background:none; border:none;" name="empname_<?php echo $row['employee_id'];?>" id="emp_name" value="<?php echo $row['first_name'];?>" /></td>
															<td><input type="text" class="form-control" style="width:100px;background:none; border:none;" name="att_date" id="att_date" value="<?php  echo date('Y-m-d'); ?>"/></td>
															<td>														
																<div class="form-control" style="background:none; border:none;">
																	<input value="present"  type="radio" name="status_<?php echo $row['employee_id'];?>"  />Present &nbsp &nbsp  &nbsp
																	<input type="radio" value="absent"  name="status_<?php echo $row['employee_id'];?>"checked/>Absent
																</div>								
															</td>
														</tr>
													<?php
														}
													?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									<input type="hidden" class="form-control" name="employee_id" id="employee_id" value="<?php 
															while($row1=mysqli_fetch_array($result1)){ 
																echo $row1['employee_id'].','; 
															} 
									?>"/>
									
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-warning pull-right btn-fill" style="height:50px; width:250px;" id='add_attendance' >submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

// $(document).ready(function(){
	$("#add_attendance").click(function(){

			$.ajax({	
				type:"POST",
				url: "mysql_query.php?action=add_attendance",
				data: $("#attendance").serialize(),
				beforeSend: function(){
				},
				success: function(response){
					
					if(response == 1){
						window.location.href="show_attendance.php";				
				   }
			
				 }
			});
		
	});
// });
</script>

<?php
include('footer.php');
?>