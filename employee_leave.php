<?php
include('header.php');

$con=mysqli_connect('localhost:3306','root','','ems');
$sql="select * from ems_employee";
$result=mysqli_query($con,$sql);
$sql1="select * from ems_document";
$result1=mysqli_query($con,$sql1);

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
					<li class="breadcrumb-item active">Employee Leave </li>
				</ol>
			</div>
			<div class="content">
				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<div class="content">
								<form method="post" id="employee_leave">										
									<div class="row">
										<div class="col-md-3">
											<label for="name">Employee ID</label>
											<select class="form-control" name="emp_id" id="emp_id" >
												<option value="">Select</option>
												<?php	while($row=mysqli_fetch_array($result)){?>
													<option value="<?php echo $row['employee_id'];?>"><?php echo $row['employee_id'];?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-3">
											<label for="name">Name</label>
											<input class="form-control" name="emp_name" id="emp_name" type="text" >
										</div>
										<div class="col-md-3">
											<label for="leave_start">Start Date of Leave</label>
											<input class="form-control" name="leave_start" id="leave_start" type="date" >
										</div>
										<div class="col-md-3">
											<label for="leave_end">End Date of Leave</label>
											<input class="form-control" name="leave_end" id="leave_end" type="date" >
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label for="leave_type">Type of Leave (EL/CL/SL)</label>
											<select class="form-control" name="leave_type" id="leave_type" >
												<option value="">Select</option>
												<option value="casual_leave">Casual Leave</option>
												<option value="sick_leave">Sick Leave</option>
												<option value="earned_leave">Earned Leave</option>
											</select>
										</div>
										<div class="col-md-4">
											<label for="leave_paid">Leave(Paid/Unpaid)</label>
											<select class="form-control" name="leave_paid" id="leave_paid" >
												<option value="">Select</option>
												<option value="paid">Paid</option>
												<option value="unpaid">Unpaid</option>
											</select>
										</div>
										<div class="col-md-4">
										
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button class="btn btn-fill btn-warning pull-right">Submit</button>
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

<script>
$(document).ready(function(){
	$('#emp_id').change(function(){
		var employee_id=$(this).val();
		$.ajax({
				type:"POST",
				url: "mysql_query.php?action=show_name",
				data: {employee_id:employee_id},
				beforeSend: function(){
				},
				 success: function(response){
					 $("#emp_name").val(response);
				 }
			});
	 });
});

	$("#employee_leave").validate({
        rules:{
			emp_id:{
				required:true,
			},
			emp_name:{
				required:true,
			},
			leave_start:{
				required:true,
			},
			leave_end:{
				required:true,
			},
			leave_type:{
				required:true,
			},
			leave_paid:{
				required:true,
			}		
		},
        messages:{
			emp_id:{
				required:"Enter Employee ID",
			},
			emp_name:{
				required:"Select Proper Employee ID",
			},
			leave_start:{
				required:"Enter Leave Starting Date",
			},
			leave_end:{
				required:"Enter Leave End Date",
			},
			leave_type:{
				required:"Select Leave Type",
			},
			leave_paid:{
				required:"Select Proper Option",
			}
        },

		submitHandler: function(form) {
       
			$.ajax({
				type:"POST",
				url: "mysql_query.php?action=employee_leave",
				data: $("#employee_leave").serialize(),
				beforeSend: function(){
				},
				success: function(response){
					if(response == 1){
						window.location.href="employee_leave.php";
						
				   } 
				}
			});
        }
     
    }); 
</script>
<?php
include('footer.php');
?>