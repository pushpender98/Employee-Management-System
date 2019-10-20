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
					<li class="breadcrumb-item active">Show Employee Document</li>
				</ol>
			</div>
			<div class="content">
				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<form method="post" action="mysql_query.php?action=ems_upload_document" enctype="multipart/form-data">	
								<div class="content">
									<div class="row">
										<div class="col-md-2">
											<label for="name">Employee ID</label>
											<select class="form-control" name="emp_id" id="emp_id" required>
												<option value="">Select</option>
												<?php	while($row=mysqli_fetch_array($result)){?>
													<option value="<?php echo $row['employee_id'];?>"><?php echo $row['employee_id'];?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-2">
											<label for="name">Name</label>
											<input class="form-control" name="emp_name" id="emp_name" type="text" required>
										</div>
										<div class="col-md-2">
											<label for="document_name">Document Name</label>
											<input type="text" name="document_name" class="form-control " placeholder="Document Name" required />
										</div>
										<div class="col-md-4">
											<label for="emsdocument">Employee ID</label>
											<input type="file" name="emsdocument" class="form-control " required />
										</div>
										
										<div class="col-md-2">
											<label for=""></label>
											<button type="submit" class="btn btn-primary btn-md btn-fill btn-block" style="width:150px;">Upload  Document</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
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
													<th>File Name</th>
													<th>File Type</th>
													<th>Remove</th>
													<th>Download</th>
												</thead>
												<tbody>
													<?php while($row1=mysqli_fetch_array($result1))
													{											
														?>
														<tr>
															<td><?php echo $row1['employee_id']; ?></td>
															<td><?php echo $row1['name']; ?></td>
															<td><?php echo $row1['file_name']; ?></td>
															<td><?php echo $row1['document_name']; ?></td>
															<td><a href="mysql_query.php?action=remove_document&id=<?php echo $row1['sno']; ?>">remove</a></td>
															<td><a href="mysql_query.php?action=download_document&id=<?php echo $row1['sno']; ?>">Download</a></td>
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
</script>
<?php
include('footer.php');
?>