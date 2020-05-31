<?php
include('../control.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>TOES ADMIN</title>
	  <meta charset="utf-8">
	  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {font-family: "Lato", sans-serif;

}

.sidebar {
  height: 100%;
  width: 210px;
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  background-color: #154360;
  overflow-x: hidden;
  padding-top: 18px;
}

.img {
  border-radius: 50%;
}

.sidebar a {
  padding: 6px 8px 6px 18px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
}
.deletebtn {
  background-color: #f44336;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.sidebar a:hover {
  color: #33BEFF;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 600px) {
  .sidebar {padding-top: 0px;}
  .sidebar a {font-size: 18px;}
}



.navbar {
  overflow: hidden;
  background-color: #808B96;
  position: fixed;
  bottom: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  font-size: 18px;
}

.navbar a:hover {
  background: #f1f1f1;
  color: black;
}

.navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.main {
  padding: 10px;
  margin-bottom: 20px;
}

.container {
  border: 1px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 20px;
  padding: 10px;
  margin: 10px 10px;
   max-width: 1000px;
  padding: 0 20px;
}

.postbody{
 
  background-color: #ECF0F1;
   border-radius: 10px;
}



.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 50%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: red;
}

.time-left {
  float: left;
  color: #999;
}
/* Place the navbar at the bottom of the page, and make it stick */
.navbar {
  background-color: #333;
  overflow: hidden;
  position: fixed;
  bottom: 0;
  width: 100%;
}

/* Style the links inside the navigation bar */
.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.navbar a.active {
  background-color: #4CAF50;
  color: white;
}
#f1{
background-color: white;


}
/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f2f2f2;
}

/* Add an active class to the active dropdown button
.activ {
  background-color: #273746;
  color: white;
}
 */
/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #566573;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
</style>

	<script type="text/javascript">
function message()
{	
alert("<?php  if (isset($_SESSION['user'])) : ?><?php
		echo "Welcome ";
		echo $_SESSION['user']['username'].' '.$_SESSION['user']['lname'];
		echo ".";echo " ";
		echo $_SESSION['success']; 
		echo $_SESSION['user']['user_type'];
		
   
   unset($_SESSION['success']); 
   ?> <?php endif ?>")
	;
}
</script>
</head>
<!--BODY STARTS HERE -->
<body>

<!--SIDE BAR STARTS -->	

<div class="sidebar">

		<!-- notification message -->
	
		<!-- logged in user information -->
		<div class="profile_info">
		<fieldset id="f1">
		   <div  class="content"  align="center">
			<?php  if (isset($_SESSION['user'])) : ?>
			 
			<?php  echo"<img  class='img' src=\"../ProfilePictures/".$_SESSION['user']['photo']."\" width='40%' height='40%'>";?>
		    
		
			<?php endif ?>
			</div>
			<div class="content" align="center">
			
				<?php  if (isset($_SESSION['user'])) : ?>
				<small>	<strong><?php echo $_SESSION['user']['username'].' '.$_SESSION['user']['lname']; ?></strong></small>
<br>
					<small>
						<i  style="color:  blue;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>

<a href="../index.php?logout='1'" style="color: red;">Logout</a>
					</small>

				<?php endif ?>
			
		</div>
		</fieldset>
	</div>
			
   <a href="adminhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
   <!--DISPLAY TOTAL NUMBER OF STUDENTS -->
<a href="view_students.php"><i class="fa fa-fw fa-group"></i>users
<span class="badge badge-light">
<?php      

$sql = "SELECT *
FROM users
";

$result = $db->query($sql);	

$num_results = $result->num_rows;
if ($num_results>0)
{
   echo "$num_results"; 
}

else 
{
    echo "0";
}		
 ?>
 </span></a> 

 </span></a> 
<div class="dropdown-btn"><i class="fa fa-fw fa-cloud"></i>Administrators
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container">
<a href="create_user.php"> Add Admin</a>

<a href="view_students.php">total Admins
<span class="badge badge-light">
<?php      

$sql = "SELECT *
FROM users where user_type='admin'
";

$result = $db->query($sql);	

$num_results = $result->num_rows;
if ($num_results>0)
{
   echo "$num_results"; 
}

else 
{
    echo "0";
}		
 ?>
 </span></a>


<a href="#csv_exp_students.php"> export List</a>

  </div>


 <div class="dropdown-btn"><i class="fa fa-fw fa-cloud"></i>Students
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container">
<a href="create_user.php"> Add student</a>

<a href="view_students.php">total students
<span class="badge badge-light">
<?php      

$sql = "SELECT *
FROM users where user_type='student'
";

$result = $db->query($sql);	

$num_results = $result->num_rows;
if ($num_results>0)
{
   echo "$num_results"; 
}

else 
{
    echo "0";
}		
 ?>
 </span></a>


<a href="#csv_exp_students.php"> export List</a>

  </div>
  
  <div class="dropdown-btn"><i class="fa fa-fw fa-plane"></i>Institutions
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container">
    <a href="#add_institution.php">Add Institution</a>
    
<a href="#view_institutions.php">Institutions
<span class="badge badge-light">
<?php      

$sql = "SELECT *
FROM users where user_type='institution'
";

$result = $db->query($sql);	

$num_results = $result->num_rows;
if ($num_results>0)
{
   echo "$num_results"; 
}

else 
{
    echo "0";
}		
 ?>
 </span></a>

    <a href="#csv_exp_Institutions.php">Export Institutions</a>
  </div>
  
  
  <div class="dropdown-btn"><i class="fa fa-fw fa-folder-open-o"></i>Courses
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container">
    <a href="#add_course.php"> <i class="fa fa-fw fa-upload"></i>Add Course</a>
    <a href="#view_courses.php"><i class="fa fa-fw fa-eye"></i> 
        View Courses
		<span class="badge badge-light">
<?php      

$sql = "SELECT *
FROM users
";

$result = $db->query($sql);	

$num_results = $result->num_rows;
if ($num_results>0)
{
   echo "$num_results"; 
}

else 
{
    echo "0";
}		
 ?>
 </span>
		</a>
    <a href="#exp_course_list.php"><i class="fa fa-fw fa-download"></i> 
        
        Export List</a>
  </div>
  
 <div class="dropdown-btn"><i class="fa fa-fw fa-cloud"></i>User Roles
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container">
<a href="add_role.php"> Add Roles</a>

<a href="view_roles.php">View Roles
<span class="badge badge-light">
<?php      

$sql = "SELECT *
FROM roles
";

$result = $db->query($sql);	

$num_results = $result->num_rows;
if ($num_results>0)
{
   echo "$num_results"; 
}

else 
{
    echo "0";
}		
 ?>
 </span></a>
<a href="#csv_exp_roles.php"> export List</a>

  </div> 
   <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

 
  <a href="#send_mail.php"><i class="fa fa-fw far fa-comments"></i>Broadcast Mail</a>
  
<a href="#update_profile.php"><i class="fa fa-fw far fa-wrench"></i>Update Profile</a>
</div>




<h2 align="center"> TANZANIA ONLINE EDUCATION SYSTEM [TOES]</h2>
<p>

</p>
<hr>
<!--
<div class="navbar">
  <a href="https://wa.me/%2B+255755489800?text=Hi%2C%20I%20need%20your%20help.">Contact Us</a>
</div>
-->
<!--MAIN BODY STARTS -->	
<div class="main">
