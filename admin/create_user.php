<?php
 include('../control.php');
?>


<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>CREATE ACCOUNT</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 15px;
  border: 0px solid #dedede;
  border-radius: 20px;
  padding: 10px;
  max-width: 1000px;
  padding: 0 20px;
  
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}
.img {
  border-radius: 50%;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
  border-radius: 5px;
  background: #9CD4F9;
  border-radius: 10px;
}

.input-field:focus {
  border: 2px solid dodgerblue;
  background: white;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 80%;
  border-radius: 20px;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

.edit{
	color: white;
}


</style>

<center><img src="../uploads/ttc logo.jpg" width="140" height="140" class="img" alt="logo"/></center>
</head>

<body><center>

<form  action="" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
    
<h6> <font color="red"><?php echo display_error(); ?></font></h6>
 <fieldset><legend>CREATE ACCOUNT| &nbsp;&nbsp;|<a href="../index.php"><b>LOGIN</b></a></legend>
 <div class="input-container">
    <i class="fa fa-user-circle icon" style='font-size:30px;color:white'></i>
    <input class="input-field" type="text" placeholder="Enter First Name" name="username">
  </div>				
				
<div class="input-container">
    <i class="fa fa-user-circle icon" style='font-size:30px;color:white'></i>
    <input class="input-field" type="text" placeholder="Enter Last Name" name="lname">
  </div>				
		
<div class="input-container">
    <i class="fa fa-envelope icon" style='font-size:30px;color:white' ></i>
    <input class="input-field" type="email" placeholder="Enter  Email" name="email">
 </div>			

<div class="input-container">
    <i class="fa fa-phone icon" style='font-size:30px;color:white' ></i>
    <input class="input-field" type="text" placeholder="Enter Phone Number" name="phone">
 </div>	

<div class="input-container">
    <i class="fa fa-key icon" style='font-size:30px;color:white' ></i>
    <input class="input-field" type="password" placeholder="Enter Password" name="password">
 </div>	
 
 <div class="input-container">
   <i class="fa fa-key icon" style='font-size:30px;color:white' ></i>
    <input class="input-field" type="password" placeholder="confirm Password" name="repassword">
 </div>
	
<div class="input-container">
    <i class="fa fa-user icon"></i>
<select name="user_type"  class="demoInputBox form-control" >
        <option value="">choose role</option>
  <?php
$sql = "SELECT role
FROM roles
";	
$result = $db->query($sql);	
if ($result->num_rows >=0)
{
	while($row = $result->fetch_assoc()) 
		{
	echo"<option value=". $row["role"].">". $row["role"]."</option>";
		}
}
 ?>          
              
 </select>
  </div>		
			
					    

<div class="input-container">
<label><font color="red">Profile Photo<label>	
<input class="input-field" type="file" name= "passport">
</font>
</div>


<div class="clearfix">
<button type="submit"   name="register_btn" class="btn">
<b>+ CREATE ACCOUNT</b></button>
</div>
		</div> 
</fieldset>
	</form>
	

  <p>Copyright &copy;. All rights reserved.</p>
</center>
	
</body>
<footer>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</footer>

</html>