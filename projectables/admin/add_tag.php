<html>
<head>
	<title>Add a Tag</title>
</head>
<body>

	<form action="add_tag.php" method="post">
	<table align="center">
		<tr>
		<td>Tag_id:</td><td><input type="text" name="id" required="required"/>
		</tr>
		<tr>
		<td>Tag_name:</td><td><input type="text" name="tag" required="required"/>
		</tr>
		<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" required="required"/>
		</tr>
		</table>
	</form>
</body>
</html>
<?php
include("dbcon.php");
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$name=$_POST['tag'];
	$qry="INSERT INTO `tags`( `id`, `name`) VALUES ('$id','$name')";
    $run=mysqli_query($con,$qry);
if ($run)
{
	echo "successfully added a tag";
	
}	
else
	echo "failed to create";
}
?>