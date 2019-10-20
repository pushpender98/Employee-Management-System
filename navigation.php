<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    <small>Employee Management System</small>
                </a>
            </div>

            <ul class="nav">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="dashboard.php">
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
					<a class="nav-link" href="profile.php">
						<i class="fa fa-fw fa-user"></i>
						<span class="nav-link-text">Profile</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="details">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleDetails">
						<i class="fa fa-fw fa-plus-square"></i>
						<span class="nav-link-text">Employee Details</span>
					</a>
					<ul class="sidenav-second-level collapse nav" id="collapseComponents">
						<li>
							<a class="nav-item" href="mysql_query.php?action=ems_add_employee">Add Employee Details</a>
						</li>
						<li>
							<a  class="nav-item " href="mysql_query.php?action=ems_show_employee">Show Employee Details</a>
						</li>
						<li>
							<a  class="nav-item " href="ems_document.php">Employee Documents</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="salary">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#examplesalary">
						<i class="fa fa-fw fa-inr"></i>
						<span class="nav-link-text">Employee Salary</span>
					</a>
					<ul class="sidenav-second-level collapse nav" id="collapseComponents1">
						<li>
							<a class="nav-item" href="salary.php">Add Employee Salary</a>
						</li>
						<li>
							<a  class="nav-item " href="salary_details.php">Show Employee Salary</a>
						</li>
					</ul>
				</li> 	
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="salary">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#examplesalary">
						<i class="fa fa-fw fa-calendar"></i>
						<span class="nav-link-text">Employee Attendance</span>
					</a>
					<ul class="sidenav-second-level collapse nav" id="collapseComponents2">
						<li>
							<a class="nav-item" href="attendance.php">Mark Employee Attendance </a>
						</li>
						<li>
							<a  class="nav-item " href="show_attendance.php">Show Employee Attendance</a>
						</li>
						<li>
							<a  class="nav-item " href="employee_leave.php">Employee Leave</a>
						</li>
						<li>
							<a  class="nav-item " href="leave_details.php">Employee Leave Detail</a>
						</li>
					</ul>
				</li> 	
            </ul>
    	</div>
    </div>
	
	 <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">   
				<div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="mysql_query.php?action=logout">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>