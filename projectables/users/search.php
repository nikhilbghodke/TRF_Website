<?php
	require('database_connection.php'); 
?>
<html>
<head>
</head>
<body>
<form name="form" action="" method="get">
	<input size="100" type="text" name="title_project" id="title_project" list="List" placeholder="Enter Author's name and Project Title"/>
	<br>
	<?php
	$query7 = "SELECT * FROM `tags` WHERE 1";
	$result7 = mysqli_query($con,$query7);
	$i=0; ?>
	<?php 
	while($row7 = mysqli_fetch_array($result7)) //Dynamic CHECKBOX
		{?>
			<input id="<?php  echo $i; ?>" type="checkbox" name="tag[]" value="<?php  echo $row7['name']; ?>" />
			<label for="<?php echo $i; ?>"><?php  echo $row7['name']; ?></label>
			<br />
			<?php } ?>
	<input type="submit" name="submit" value="Submit"/>
</form>
<datalist id="List">
<?php
	$query = "SELECT * FROM `project` WHERE 1";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_array($result))
		{?>
			<option value="<?php echo $row['title'];?>">
			<?php
			} 
			?>
</datalist>
<datalist id="List2">
<?php
	$query2 = "SELECT * FROM `project` WHERE 1";
	$result2 = mysqli_query($con,$query2);
	while($row = mysqli_fetch_array($result2))
		{?>
			<option value="<?php echo $row['tags'];?>">
			<?php
			} 
			?>
</datalist>
<?php
$_SESSION['title_project']="";

		
		if(isset($_GET['tag']))
			{
				$i=1;
			$checked=$_GET['tag'];
			$count = count($checked);
			$_SESSION['title_project']= $_GET['title_project'];
			$_SESSION['tag_project']=$_GET['tag'];
			$title=$_SESSION['title_project'];
			$tag_project="";
				foreach($_GET['tag'] as $selected)
					{
						$q = "SELECT * FROM `tags` WHERE name='$selected'";
						$r = mysqli_query($con,$q);
						$row = mysqli_fetch_array($r);
						if($i==$count)
						 	{
						 				$tag_project=$tag_project. $row['id'];
						 				
												
						}
						else
						 {
										$tag_project=$tag_project. $row['id']. ",";
											
							}
							$i++;		
						}
					}
						
					if(isset($_GET['submit']))
					{
						
			$_SESSION['title_project']= $_GET['title_project'];
			$title=$_SESSION['title_project'];
			if(!empty($_SESSION['title_project']))
				{
					if(isset($_SESSION['tag_project']))// both title and tags selected
						{
							
							$query3="SELECT * FROM project WHERE title='$title'"; 
							$result3 = mysqli_query($con,$query3);
							$num_rows = mysqli_num_rows($result3);
							if($num_rows>0)
						 		{
									while($row = mysqli_fetch_array($result3))
										{ 	?>							
								 			<a href="search.php"><?php echo $row['title'];?></a> <?php #replace search.php with file where it will get redirected
											echo "<br>";
					         			echo "Team id-".$row['id'];
											echo "<br>";
											echo "<br>";
										}	
								}	
								else
								 	{
										echo '<script type="text/javascript">
										alert("No Projects Found with given criteria");
										</script>';
										echo "No projects found";
									}	
						}
						else  //if no tags selected
					 		{
								$query3="SELECT * FROM project WHERE title='$title'";
								$result3 = mysqli_query($con,$query3);
								$num_rows = mysqli_num_rows($result3);
								if($num_rows>0)
									{
										while($row = mysqli_fetch_array($result3))		
											{ 	?>
												<a href="search.php"><?php echo $row['title'];?></a> <?php #replace search.php with file where it will get redirected
												echo "<br>";
					         				echo "Team id-".$row['id'];
												echo "<br>";
												echo "<br>";
												
											}
									}
								else  //if no title matches
								 	{
										echo '<script type="text/javascript">
										alert("No Projects Found with given criteria");
										</script>';
										echo "No projects found";
							
									}}
							}
				else if(!empty($_SESSION['tag_project']))  //No title and only tag selected
	 				{

	 					$string = $tag_project;
	 					$j=0;
	 					$k=FALSE;
						$ids = explode(',', $string);
						$d=count($ids);
						$query11="SELECT * FROM project WHERE 1";
						$result11 = mysqli_query($con,$query11);
						$num_rows1 = mysqli_num_rows($result11);
						
								while($row11 = mysqli_fetch_array($result11))
									{
								if (strpos($row11['tags'], $ids[$j]) !== false)
								 {?>
								 <a href="search.php"><?php echo $row11['title'];?></a> <?php #replace search.php with file where it will get redirected
										echo "<br>";
					         		echo "Team id-".$row11['id'];
										echo "<br>";
										echo "<br>";
										$k=TRUE;
								}
								
								}
								if($k==FALSE)//if no tags match
								 {
								 			echo ' <script type="text/javascript">
					alert("Please select  Valid Project or Tag");
					</script>';

						}								
								
					}
					
	else //If nothing is selectes
		 {
			echo ' <script type="text/javascript">
					alert("Please select  Valid Project or Tag");
					</script>';
								
			}
			}
			
		
	

?>
</body>
</html>