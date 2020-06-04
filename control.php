<?php

session_start();

	// connect to database
$db = mysqli_connect('localhost','root','', 'toes');

	
	
	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}
	// call the login() function if register_btn is clicked
	if (isset($_POST['login'])) {
		login();
	}
//CHAT FUNCTION
	if (isset($_POST['send_message'])) {
		chat();
	}
	if (isset($_POST['send_mail'])) {
		sendMail();
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: index.php");
	}
	//add application
		if (isset($_POST['add_application']))
	{
	    add_application();
	}
//add Students
		if (isset($_POST['add_student']))
	{
	    add_student();
	}
	
	//Edit Students
		if (isset($_POST['edit_student']))
	{
	    edit_student();
	}
		//Update Students Profile
		if (isset($_POST['update_profile']))
	{
	    update_profile();
	}
			//Reset Password
		if (isset($_POST['reset_password']))
	{
	   reset_password();
	}
//ADD ROLES
		if (isset($_POST['add_role']))
	{
	   add_role();
	}
	//EDIT ROLES
		if (isset($_POST['edit_role']))
	{
	   edit_role();
	}
//UPDATE PROFILE
	function update_profile(){
		global $db, $errors;

		// receive all input values from the form
		$name         =e($_POST['name']);
		$user_id      =e($_POST['user_id']);
		

//PROFILE PICTURE UPLOAD
$imgfile= $_FILES["photo"]["name"];

$length = 4;
$token = bin2hex(openssl_random_pseudo_bytes($length));

// form validation: ensure that the form is correctly filled
	
		if (empty($name)) { 
			array_push($errors, "Username is required...please login to get it"); 
		}
      if (empty($user_id)) { 
			array_push($errors, "user id is required..please login to get it"); 
		}
      
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".JPG",".JPEG",".PNG");

// Validation for allowed extensions .in_array() function searches an array for a specific value.

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png format allowed');</script>";
}

else
   {

//rename the image file
$photo=$name.$user_id.$token.$extension;

// Code for move image into directory
move_uploaded_file($_FILES["photo"]["tmp_name"],"ProfilePictures/".$photo);


// register user if there are no errors in the form
		if (count($errors) == 0) {
		$query3 = mysqli_query($db,"UPDATE users
		SET photo  ='$photo' 
		where id ='$user_id'
		");	
		
	if($query3)
	 {
 echo "<script>alert('Profile UPDATED successfully');</script>";
     }
 else{
echo "<script>alert('Profile NOT UPDATED, Please Try Again!!!');</script>";
 }			
		
		}

	}
}
// REGISTER ROLES
	function add_role(){
		global $db, $errors;
	
		// receive all input values from the form
		$role    =e($_POST['role']);
		$createdBy =e($_POST['createdBy']);
		
		

		// form validation: ensure that the form is correctly filled
		if (empty($role)) { 
			array_push($errors, "Role is required"); 
		}
		if (empty($createdBy)) { 
			array_push($errors, "Created By name is required"); 
		}
		


		
	
					// register user if there are no errors in the form
					if (count($errors) == 0) {
					

				
				$query = "INSERT INTO roles(
				role,createdBy
				
				)
		        values('$role','$createdBy')";
				
				 $query4= mysqli_query($db,$query);
				 if($query4)
				 {
				 echo "<script>alert('Role ADDED successfully');</script>";
				 }
				 else
					echo "<script>alert('Role NOT ADDED, Please Try Again!!!');</script>";
				
		
		}
		

	}	

// EDIT ROLES
	function edit_role(){
		global $db, $errors;
	
		// receive all input values from the form
		$role    =e($_POST['role']);
		$editedBy =e($_POST['editedBy']);
		$roleId = $_GET['roleId'];

		// form validation: ensure that the form is correctly filled
		if (empty($role)) { 
			array_push($errors, "Role is required"); 
		}
		if (empty($editedBy)) { 
			array_push($errors, "editedBy name is required"); 
		}


		
	
					// register user if there are no errors in the form
					if (count($errors) == 0) {
					

				
				$query = "UPDATE roles
				SET 
				role = '$role',
			    editedBy ='$editedBy'
				WHERE roleId ='$roleId'";
				
				 $query2= mysqli_query($db,$query);
				 if($query2)
				 {
				 echo "<script>alert('Role UPDATED successfully');</script>";
				 }
				 else
					echo "<script>alert('Role NOT UPDATED, Please Try Again!!!');</script>";
				
		
		}

	}		

// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$lname       =  e($_POST['lname']);
		$email       =  e($_POST['email']);
		$phone       =  e($_POST['phone']);
		$password  =  e($_POST['password']);
		$repassword  =  e($_POST['repassword']);
		$user_type  =  e($_POST['user_type']);
		
//PROFILE PICTURE UPLOAD
$imgfile= $_FILES["passport"]["name"];

$length = 4;
$token = bin2hex(openssl_random_pseudo_bytes($length));


      
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".JPG",".JPEG",".PNG");

// Validation for allowed extensions .in_array() function searches an array for a specific value.

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png format allowed');</script>";
}
else
   {
$name = $username.' '.$lname;
//rename the image file
$photo=$name.$token.$extension;

// Code for move image into directory
move_uploaded_file($_FILES["passport"]["tmp_name"],"../ProfilePictures/".$photo);



		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($lname)) { 
			array_push($errors, "Last name is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($phone)) { 
			array_push($errors, "Phone number is required"); 
		}
		if (empty($password)) { 
			array_push($errors, "Password is required"); 
		}
		
		if ($password != $repassword) {
			array_push($errors, "The two passwords do not match");
		}
		if (empty($user_type)) { 
			array_push($errors, "User Type is required"); 
		}
		
	//CHECK IF USERNAME OR EMAIL IS ALREADY IN USE	
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  


    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  if ($user['phone'] === $phone) {
      array_push($errors, "phone number already exists,<br> please change it and try again");
    }
	

 
		
	// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);//encrypt the password before saving in the database
			$repassword = md5($repassword);
			if (isset($_POST['user_type'])) 
			{
				$user_type = e($_POST['user_type']);
				
				$query = "INSERT INTO users(username,lname,email,phone,password,repassword,user_type,photo) 		    
		                values('$username','$lname','$email','$phone','$password','$repassword','$user_type','$photo')";
				
				mysqli_query($db, $query);
				
				// Send email to user with the token in a link they can click on
   $password  =  e($_POST['password']);
    $to = $email;
    $subject = "Welcome To TOES";
    $msg = "Hi $username ,Welcome to Tanzania Online Education System(TOES).
    Click the following link \"index.php\" to LOGIN to our site.
    
    Your USERNAME will be: $username or $email and 
    Your PASSWORD will be:  $password
    
    Please keep your password private. 
    If you will need any help, please dont hesistate to call us on 
    +255 655 258012 (Developer) ";
    $msg = wordwrap($msg,100);
    $headers = "From: admin@toes.co.tz";
    mail($to, $subject, $msg, $headers); 
    header('location: ../waiting.php?email=' .$email);
				
			
				echo "<script>alert('ACCOUNT CREATED SUCCESFULY');</script>";
		}
		
	
			
			
			
    
			

        }
	}
	}

	
	// return Application array from their id
	function getAppById($id){
		global $db;
		$query = "SELECT * FROM application WHERE id=".$id;
		$result = mysqli_query($db, $query);
		$app= mysqli_fetch_assoc($result);
		return $app;
	}	
	
	
	
	
	
	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=".$id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	
	// LOGIN USER
	function login()
	{
		global $db, $username,$email,$password ,$errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' OR email='$username' AND password='$password' LIMIT 1";
			$query1 = "SELECT * FROM application WHERE email='$email'LIMIT 1";
			$results1 = mysqli_query($db, $query1);
			$results = mysqli_query($db, $query);

					if (mysqli_num_rows($results) == 1) { // user found
						// check if user is admin or user
					
						$logged_in_user = mysqli_fetch_assoc($results);
						
						if ($logged_in_user['user_type'] == 'admin') 
						{
                     
							$_SESSION['user'] = $logged_in_user;
							$_SESSION['success']  = "You are now logged in";
							header('location: admin/adminhome.php');		  
						}
							else if ($logged_in_user['user_type'] == 'student')
							{
							
								$_SESSION['user'] = $logged_in_user;
								$_SESSION['success']  = "You are now logged in";

								header('location: student/studenthome.php');
							}
							else if ($logged_in_user['user_type'] == 'institution')
							{
								$_SESSION['user'] = $logged_in_user;
								$_SESSION['success']  = "You are now logged in";

								header('location: institutionhome.php');
							}
							else if ($logged_in_user['user_type'] == 'manager')
							{
								$_SESSION['user'] = $logged_in_user;
								$_SESSION['success']  = "You are now logged in";

								header('location: manager.php');
							}
							
							else if ($logged_in_user['user_type'] == 'accountant')
							{
								$_SESSION['user'] = $logged_in_user;
								$_SESSION['success']  = "You are now logged in";

								header('location: admin.php');
							}
					}
			else {
				array_push($errors, "Wrong username/password combination");
			}
		/*
		if (mysqli_num_rows($results1) == 1)
		{
		   $applied  = mysqli_fetch_assoc($results1);
		 
            $_SESSION['app'] = $applied;
			$_SESSION['success']  = "You already applied";
			header('location: studenthome.php');		  
		
		}
			*/
			
			
		}
	}
	//function is logged in
	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}
	//function is applied
		function isApplied()
	{
		if (isset($_SESSION['app'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}
	function isStudent()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'student' ) {
			return true;
		}else{
			return false;
		}
	}
function isManager()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'manager' ) {
			return true;
		}else{
			return false;
		echo	"<script>alert('You are PROHIBITED to acces this page!!!');</script>";
		}
	}
	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}
	function display_error() {
		global $errors;
		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
	/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/

if (isset($_POST['reset_btn'])) {  
  $email = mysqli_real_escape_string($db,$_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT email FROM users WHERE email='$email'";
  $results = mysqli_query($db, $query);

  if (empty($email)) {
    array_push($errors, "<font color='white'>Your email is required</font>");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "<font color='white'>Sorry, no user exists on our system with that email </font>");
  }
  // generate a unique random token of length 5
  
  
$length = 5;
$token = bin2hex(openssl_random_pseudo_bytes($length));
   

 
  
 if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($db, $sql);
    
if($results){
    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "OSAS PASSWORD RESET";
     $msg = "Hi there, 
click on this link \"../new_pass.php\" and use token bellow to reset your password on our site
TOKEN: $token 
_____________
Regards;
TOES TEAM
+255 655 258012
";
    $msg = wordwrap($msg,70);
    $headers = "From: TOES TEAM<usmanmchinja@gmail.com>";
    mail($to, $subject, $msg, $headers);
    header('location:waiting.php?email=' .$email);
}
  }

	


		
	}
	
?>