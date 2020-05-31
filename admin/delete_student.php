
<?php
include('../control.php');
	
?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
.deletebtn {
  background-color: #f44336;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
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
	  <title>DELETE STUDENT</title>

      <?php
         if(isset($_POST['delete'])) {
			 
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
           
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
			
            $std_id = $_GET['id'];
            
            $sql = "DELETE FROM users WHERE id= $std_id" ;
            mysql_select_db('toes');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not delete Student: ' . mysql_error());
            }
            
            
            	echo "<center><br><br><br>

<div class='alert alert-success alert-dismissible fade show'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong>STUDENT Deleted successfully!</strong>
</div>
<br></font><br><br><a href='view_students.php'><img src='../uploads/back.png' alt='BACK' ></a></center>";
            mysql_close($conn);
         }else {
			 
            ?><center>
			<br><br><br><br><br><br>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "600" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                   
                     
           
                     <tr>
<td width = "100"> </td>
 <td><font color="#17202A" size="4 px"> Are you sure you want to delete <b>
     
     
 <!-- FETCHING STUDENT NAME -->   
     <?php
$std_id 	= $_GET['id'];

$sql = "SELECT *
FROM users where id ='$std_id'
";	

$result = $db->query($sql);	

if ($result->num_rows >=0)
{

$row = $result->fetch_assoc();

$name =$row["username"].' '.$row["lname"];
global $name;
}?>
     
 <?php echo $name ;?>
 
 </b> <br>with 
 id= <b>
 <!--FETCHING ROLE ID -->
 <?php echo $_GET['id'];?></b> ??
 
 </font></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <button name = "delete" type = "submit" 
                              id = "delete" class="deletebtn">Delete Student</button>
                        </td>
                     </tr>
                     <tr>
                         <td width = "100"> </td>
                         <td>
                             <a href='view_students_applied.php'>
        <button type="button" class="btn btn-warning">Cancel</button>
                                
                                 <!--<img src='uploads/back.png' alt='BACK' >-->
                                 
                                 </a>";
                         </td>
                     </tr>
                     
                  </table>
               </form>
	</center>
            <?php
         }
?>
      <?php
 include('../footer.php');
	
	
?>