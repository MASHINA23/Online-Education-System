<?php
include('../control.php');
	
?>


<title>Edit ROLE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

.edit{
	color: white;
}

</style>
<div class="edit">
<p><font bold color="white"> <i class="fa fa-user icon"><a href="view_roles.php" >View Roles</a></i></font></p>
</div>
<form class="form1" action="" style="max-width:500px;margin:auto" method="post">
  <h2>edit ROLE</h2>
<h6> <font color="red"><?php echo display_error(); ?></font></h6>
 
 
   <div class="input-container">
    <i class="fa fa-user icon"></i>
	
	<?php
$roleId	= $_GET['roleId'];
$sql = "SELECT role,roleId
FROM roles where roleId ='$roleId'
";	
$result = $db->query($sql);	
if ($result->num_rows >=0)
{
	$row = $result->fetch_assoc();

	echo"<input class='input-field' type='text' placeholder='Write Role title ' name='role' value=".$row["role"].">";
		
}
 ?>
  </div>


	<div class="input-container">
	
		<div class="content" align="center">
				<?php  if (isset($_SESSION['user'])) : ?>
				 <input class="input-field" type="hidden" placeholder="Sender Name" 
				 name="editedBy" value="<?php echo $_SESSION['user']['username'].' '.$_SESSION['user']['lname']; ?>" readonly>
				<?php endif ?>
		</div>

    </div>
  


  <button name="edit_role" type="submit" class="btn">UPDATE ROLE</button>
</form>


<?php
 include('../footer.php');
	
	
?>
