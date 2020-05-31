<?php
include('../control.php');
	
?>
<h3>LIST OF ROLES</h3>
  <?php
$sql = "SELECT *
FROM roles
";	
$result = $db->query($sql);	
if ($result->num_rows >=0)
 {
	echo "<table border='1' width='100% px' bgcolor='#f7f9f9'>
		<tr>
<th>ROLE ID</th>
<th>ROLE NAME</th>
<th>CREATED BY</th>
<th>EDITED BY</th>
<th>DATE ADDED</th>
<th>ACTIONS</th>
</tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo   "
<tr>
<td >" . $row["roleId"]."</td>

<td >" . $row["role"]."</td>

<td >" . $row["createdBy"]."</td>
<td >" . $row["editedBy"]."</td>
<td >" . $row["createdTime"]."</td>
<td>" 
 . 

"<a href=\"edit_role.php?roleId=".$row["roleId"]."\">Edit Role</a>"
.' &nbsp; &nbsp;'."<a href=\"delete_role.php?roleId=".$row["roleId"]."\">delete Role</a>"

." </td>

			 
 ";
		
		}
		echo "</table>";
		
 }
	    else
		{
		echo "NO ROLE(S) available!!";
        }

 ?>
<?php
 include('../footer.php');
	
	
?>