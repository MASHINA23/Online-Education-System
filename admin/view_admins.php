<?php
include('../control.php');
	
?>
<h3>LIST OF STUDENTS</h3>
  <?php
$sql = "SELECT *
FROM users where user_type='admin'
";	
$result = $db->query($sql);	
if ($result->num_rows >=0)
 {
	echo "<table border='1' width='100% px' bgcolor='#f7f9f9'>
		<tr>
<th>ID</th>
<th>FIRST NAME</th>
<th>LAST NAME</th>
<th>EMAIL ADDRESS</th>
<th>PHONE NO</th>
<th>PHOTO</th>
<th>DATE ADDED</th>
<th>ACTIONS</th>
</tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo   "
<tr>
<td >" . $row["id"]."</td>

<td >" . $row["username"]."</td>

<td >" . $row["lname"]."</td>

<td >" . $row["email"]."</td>

<td >" . $row["phone"]."</td>

<td >"."<a href=\"../ProfilePictures/".$row["photo"]."\">Preview</a>"."</td>

<td >" . $row["date_added"]."</td>
<td>" 
 . 

"<a href=\"edit_student.php?roleId=".$row["id"]."\">Edit student</a>"
.' &nbsp; &nbsp;'."<a href=\"delete_student.php?id=".$row["id"]."\">delete Student</a>"

." </td>

			 
 ";
		
		}
		echo "</table>";
		
 }
	    else
		{
		echo "NO Student(S) available!!";
        }

 ?>
<?php
 include('../footer.php');
	
	
?>