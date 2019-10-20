<?php
include('header.php');

$con=mysqli_connect('localhost:3306','root','','ems');
$sql="select * from ems_employee";
$result=mysqli_query($con,$sql);
$result1=mysqli_query($con,$sql);

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
					<li class="breadcrumb-item active">Add Employee Salary</li>
				</ol>
			</div>
			<div class="content">
				<div class="card">
					<div class="row">
						<form id="add_salary" method="post">
							<div class="col-md-12">
								<div class="content">								
									<div class="row">
										<div class="col-md-2">
											<label for="name">Employee ID</label>
											<select class="form-control" name="emp_id" id="emp_id">
												<option value="">Select</option>
												<?php	while($row=mysqli_fetch_array($result)){?>
													<option value="<?php echo $row['employee_id'];?>"><?php echo $row['employee_id'];?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-2">
											<label for="name">Name</label>
											<input class="form-control" name="emp_name1" id="emp_name1" type="text">
										</div>
										<div class="col-md-4">
											<label for="basic_pay ">Basic Pay</label>
											<input class="form-control total_sal numbersOnly" name="basic_pay" id="basic_pay" type="text" placeholder="Enter Basic pay"  >
										</div>
										
										<div class="col-md-4">
											<label for="da">DA</label>
											<input class="form-control total_sal numbersOnly" name="da" id="da" type="text"  placeholder="Enter DA" >
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-4">
											<label for="hra">HRA</label>
											<input class="form-control total_sal numbersOnly" name="hra" id="hra" type="text"  placeholder="Enter HRA"  >
										</div>
										<div class="col-md-4">
											<label for="">Total Salary</label>
											<input class="form-control numbersOnly" name="total_salary" id="total_salary" type="text"  placeholder="Your Total Salary" >
										</div>
										
										<div class="col-md-4">
											<label for="">PF</label>
											<input class="form-control numbersOnly" name="pf" id="pf" type="text"  placeholder="Enter PF" >
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-4">
											<label for="total_days">Enter Total Number of Days</label>
											<input class="form-control days numbersOnly" name="total_days" id="total_days" type="text" placeholder="Enter Total Number of Days" max="30" min="20" required  >
										</div>
										<div class="col-md-4">
											<label for="working_days">Working Days</label>
											<input class="form-control days numbersOnly" name="working_days" id="working_days" type="text" placeholder="Enter Total Number of Working Days" max="30" min="10" required  >
										</div>
										
										<div class="col-md-4">
											<label for="paid_leave">Total Number of Paid Leave</label>
											<input class="form-control days numbersOnly" name="paid_leave" id="paid_leave" type="text"  placeholder="Enter Number of Paid Leave"  max="30" min="0" required  >
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-4">
											<label for="days_absent">Total Number of Days Absent</label>
											<input class="form-control days numbersOnly" name="days_absent" id="days_absent" type="number"  placeholder="Enter Number of Days Absent" max="30" min="0" required >
										</div>
										<div class="col-md-4">
											<label for="present_days">Days Present</label>
											<input class="form-control numbersOnly " name="present_days" id="present_days" type="text"  placeholder="Present Days" max="30" min="0" required >
										</div>
										
										<div class="col-md-4">
											<label for="paid_per_day">Paid Per Day</label>
											<input class="form-control numbersOnly" name="paid_per_day" id="paid_per_day" type="text" placeholder="Paid per Day">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-4">
											<label for="month"> Select Month</label>
											<select id="month" name="month" class="form-control">	
													<option value=''>Select</option>
													<option value="janurary">january</option>
													<option value="february">february</option>
													<option value="march">march</option>
													<option value="april">april</option>
													<option value="may">may</option>
													<option value="june">june</option>
													<option value="july">july</option>
													<option value="august">august</option>
													<option value="september">september</option>
													<option value="october">october</option>
													<option value="november">november</option>
													<option value="december">december</option>
											 </select>
										</div>
										<div class="col-md-4">
											<label for="net_salary">Net Salary</label>
											<input class="form-control numbersOnly" name="net_salary" id="net_salary" type="text"  placeholder="Net Salary">
										</div>
										
										<div class="col-md-4"></div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block pull-right btn-fill" style="height:50px; width:300px;">Add Salary</button>
							</div>
						</form>
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
	$('.numbersOnly').keyup(function () { 
		this.value = this.value.replace(/[^0-9\.]/g,'');
	});
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
					 $("#emp_name1").val(response);
				 }
			});
	 });
		
		$(document).on("keyup", ".days ", function() {
			var total_days=$('#total_days').val();
			var paid_leave=$('#paid_leave').val();
			var days_absent=$('#days_absent').val();
			
			present_days=total_days-(days_absent-paid_leave);
			$("#present_days").val(present_days);
		});
		
		$(document).on("change keyup", function() {
			var total_salary = 0;
			$(".total_sal").each(function(){
				total_salary += +$(this).val();
			});
			$("#total_salary").val(total_salary);
			var total_salary=$('#total_salary').val();
			var total_days=$('#total_days').val();
			var paid_per_day=total_salary/total_days;
				$("#paid_per_day").val(paid_per_day);
			$("#present_days").val();
			var pf=$('#pf').val();
			var net_salary=(paid_per_day*present_days)-pf;
			$("#net_salary").val(net_salary);
		});
});
</script>
<script>
	$("#add_salary").validate({
        rules:{
            emp_id:{
                required:true,
				
            },
            emp_name1:{
                required:true,
            },
			basic_pay:{
				required:true,
			},
			da:{
				required:true,
			},
			hra:{
				required:true,
			},
			total_salary:{
				required:true,
			},
			pf:{
				required:true,
			},
			total_days:{
				required:true,
			},
			working_days:{
				required:true,	
			},
			paid_leave:{
				required:true,
			},
			days_absent:{
				required:true,
			},
			present_days:{
				required:true,
			},
			paid_per_day:{
				required:true,	
			},
			month:{
				required:true,
			},
			net_salary:{
				required:true,
			}
			
		},
        messages:{
           emp_id:{
				 required: "Please enter emp_id",
            },
            emp_name1:{
				 required: "Please enter employee name",
            },
			basic_pay:{
				 required: "Please enter Basic Pay",
			},
			da:{
				 required: "Please enter DA",
			},
			hra:{
				 required: "Please enter  HRA.",
			},
			total_salary:{
				 required: "Please enter Total Salary.",
			},
			pf:{
				 required: "Please enter PF",
			},
			total_days:{
				 required: "Please enter Total Days",
			},
			working_days:{
				 required: "Please enter Working Days.",
			},
			paid_leave:{
				 required: "Please enter Paid Leave.",
			},
			days_absent:{
				 required: "Please enter Days Absent.",
			},
			present_days:{
				 required: "Please enter Present Days.",
			},
			paid_per_day:{
				 required: "Please enter Paid Per Days.",
			},
			month:{
				 required: "Please enter Month.",
			},
			net_salary:{
				 required: "Please enter Net Salary.",
			}
        },

		submitHandler: function(form) {
       
			$.ajax({
				type:"POST",
				url: "mysql_query.php?action=add_salary",
				data: $("#add_salary").serialize(),
				beforeSend: function(){
				},
				success: function(response){
					if(response == 1){
						window.location.href="salary_details.php";
						
				   }
				}
			});
		}
    }); 
</script>

<?php
include('footer.php');
?>