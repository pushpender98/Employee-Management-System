<?php

$con=mysqli_connect('localhost:3306','root','','ems');

//Registration Form
if($_GET['action']=='register'){
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cnfpassword=$_POST['cnfpassword'];
	$mobile=$_POST['mobile'];
	
	$sql="insert into ems_hr_profile (`employee_id`,`first_name`,`last_name`,`email`,`password`,`cnf_password`,`mobile`) values ('default','$fname','$lname','$email','$password','$cnfpassword','$mobile')";
	if(mysqli_query($con,$sql)){
		echo '1';
	}
}
	
//Login Form
if($_GET['action']=='login'){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="select email, password,employee_id from ems_hr_profile";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$userid=$row['employee_id'];
	if($username==$row['email'] && $password==$row['password']){
		session_start();
		$_SESSION["employee_id"] = $userid;
		echo '1';
	}
	else
	{
		echo '2';
	}
}

//Logout Form
if($_GET['action']=='logout'){
	session_start();
	session_destroy();
	header('Location:index.php');	
}
//Add Employee Details
if($_GET['action']=='ems_add_employee'){
	header('Location:add_profile.php');	
}
//show Employee Details
if($_GET['action']=='ems_show_employee'){
	header('Location:employee_details.php');	
}
//Add Employee
if($_GET['action']=='add_employee'){
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$mobile=$_POST['mobile'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$city=$_POST['city'];
	$dob=$_POST['dob'];
	$desc=$_POST['bio'];
	
	
	
	$sql="insert into ems_employee(`employee_id`,`first_name`,`last_name`,`email`,`gender`,`mobile_no`,`phone_no`,`address`,`pincode`,`city`,`date_of_birth`,`bio`) values ('default','$fname','$lname','$email','$gender','$mobile','$phone','$address','$pincode', '$city', '$dob', '$desc')";
	if(mysqli_query($con,$sql)){
		echo '1';
	}
}
//Remove Employee Details
if($_GET['action']=='remove'){
	$id=$_GET['id'];
	
	$sql="delete from ems_employee where employee_id='$id'";
	if(mysqli_query($con,$sql)){
		header('Location:employee_details.php');
	}
}

//Update Employee Profile
if($_GET['action']=='update_employee'){
	$employee_id=$_GET['id'];
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$mobile=$_POST['mobile'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$city=$_POST['city'];
	$dob=$_POST['dob'];
	$desc=$_POST['bio'];
	
	
	$sql="UPDATE `ems_employee` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `mobile_no` = '$mobile', `phone_no` = '$phone', `address` = '$address', `pincode` = '$pincode', `city` = '$city', `date_of_birth` = '$dob', `bio` = '$desc', gender='$gender' WHERE`employee_id` = '$employee_id'";
	
	if(mysqli_query($con,$sql)){
		echo '1';
	}
}
//Update HR
if($_GET['action']=='update_hr'){
	session_start();
	$employee_id=$_SESSION['employee_id'];
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$mobile=$_POST['mobile'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$city=$_POST['city'];
	$dob=$_POST['dob'];
	$password=$_POST['password'];
	
	
	$sql="UPDATE `ems_hr_profile` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `mobile` = '$mobile', `phone` = '$phone', `address` = '$address', `pincode` = '$pincode', `city` = '$city', `dob` = '$dob', gender='$gender', `password`='$password', `cnf_password`= '$password' WHERE`employee_id` = '$employee_id'";
	
	if(mysqli_query($con,$sql)){
		echo '1';
	}
}
//Salary .php Page show name
if($_GET['action']=='show_name'){
	$employee_id=$_POST['employee_id'];
	$sql="select first_name from ems_employee where employee_id='$employee_id'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
			$emp_name=$row['first_name'];
			echo $emp_name;
	}
}
//Add Salary
if($_GET['action']=='add_salary'){
	$employee_id=$_POST['emp_id'];
	$employee_name=$_POST['emp_name1'];
	$basic_pay=$_POST['basic_pay'];
	$da=$_POST['da'];
	$hra=$_POST['hra'];
	$total_salary=$_POST['total_salary'];
	$pf=$_POST['pf'];
	$working_days=$_POST['working_days'];
	$total_days=$_POST['total_days'];
	$paid_leave=$_POST['paid_leave'];
	$days_absent=$_POST['days_absent'];
	$present_days=$_POST['present_days'];
	$paid_per_day=$_POST['paid_per_day'];
	$month=$_POST['month'];
	$net_salary=$_POST['net_salary'];
	
	
	$sql="insert into ems_salary(`sno`,`employee_id`,`name`,`basic_pay`,`da`,`hra`,`total_salary`,`pf`,`working_days`,`total_days`,`paid_leave`,`absent_days`,`present_days`,`paid_per_day`,`month`,`net_salary`) values ('default','$employee_id','$employee_name','$basic_pay','$da','$hra','$total_salary','$pf','$working_days', '$total_days', '$paid_leave', '$days_absent', '$present_days','$paid_per_day','$month','$net_salary')";
	if(mysqli_query($con,$sql)){
		echo '1';
	}
}
//Add Document
if($_GET['action']=='ems_upload_document'){
	
	$employee_id=$_POST['emp_id'];
	$employee_name=$_POST['emp_name'];
	$document_name=$_POST['document_name'];
	
      $errors= array();
	  $target_path="Upload/";
      $target_path = $target_path.basename( $_FILES['emsdocument']['name']);   
      $file_tmp =$_FILES['emsdocument']['tmp_name'];
      $file_type=$_FILES['emsdocument']['type'];
		
      $expensions= array("jpeg","jpg","png","pdf","docx");
		
	if(empty($errors)==true){
			move_uploaded_file($file_tmp, $target_path);

			$sql="INSERT INTO ems_document(`sno`,`employee_id`,`name`,`file_name`,`file_type`,`document_name`) VALUES('default','$employee_id','$employee_name','$target_path','$file_type','$document_name')";
			
			if(mysqli_query($con,$sql)){
				header('Location:ems_document.php');
			}
      }
	  else{
         print_r($errors);
      }
   
}
// Remove Document
if($_GET['action']=='remove_document'){
	$id=$_GET['id'];
	$sql1="select * from ems_document where sno='$id'";
	$row=mysqli_query($con,$sql1);
	$result=mysqli_fetch_array($row);
	$filename=$result['file_name'];
	
	$sql="delete from ems_document where sno='$id'";
		
	
	if(mysqli_query($con,$sql)){
		 $status=unlink($filename);  
		header('Location:ems_document.php');
	}
}

// Download  Document
if($_GET['action']=='download_document'){
	$id=$_GET['id'];
	$sql1="select * from ems_document where sno='$id'";
	
	$row=mysqli_query($con,$sql1);
	$result=mysqli_fetch_array($row);
	$filename=$result['file_name'];

	header('Content-Type: application/octet-stream');  
	header("Content-Transfer-Encoding: utf-8");   
	header("Content-disposition: attachment; filename=\"" . basename($filename) . "\"");   
	readfile($filename);  
}
//Remove Salary
if($_GET['action']=='remove_salary'){
	$id=$_GET['id'];
	$sql="delete from ems_salary where sno='$id'";
		
	
	if(mysqli_query($con,$sql)){
		header('Location:salary_details.php');
	}
}
//Attendance Add
if($_GET['action']=='add_attendance'){
	
	$emp_id=$_POST["employee_id"];
	$emp_id1=rtrim($emp_id,',');
	$att_id=explode(',',$emp_id1);
	
	$attendance_date=$_POST['att_date'];
	
	foreach($att_id as $id){
		$name=$_POST['empname_'.$id];
		$status=$_POST['status_'.$id];
		
		$sql="insert into ems_attandance(`sno`,`employee_id`,`name`,`date`,`status`) values ('default','$id','$name','$attendance_date','$status')";
		$mark=mysqli_query($con, $sql);
		
	}
	echo '1';
	
}
//Employee Leave
if($_GET['action']=='employee_leave'){
	$emp_id=$_POST['emp_id'];
	$emp_name=$_POST['emp_name'];
	$leave_start=$_POST['leave_start'];
	$leave_end=$_POST['leave_end'];
	$leave_type=$_POST['leave_type'];
	$leave_paid=$_POST['leave_paid'];
	
	$sql="insert into ems_leave(`sno`,`employee_id`,`name`,`leave_start`,`leave_end`,`leave_type`,`leave_paid`) values ('default','$emp_id','$emp_name','$leave_start','$leave_end','$leave_type','$leave_paid')";
	
	if(mysqli_query($con, $sql)){
		echo '1';
	}
}
?>