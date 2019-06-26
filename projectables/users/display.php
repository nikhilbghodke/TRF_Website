<?php
	require('database_connection.php'); 
	if(isset($_GET['link']))
	 {
		$title=$_GET['link'];
		$query3="SELECT * FROM project WHERE title='$title'"; 
		$result3 = mysqli_query($con,$query3);
		$row = mysqli_fetch_array($result3);
		echo "<br>";
		echo "Title-".$row['title'];
		echo "<br>";
		echo "Status-".$row['status'];
		echo "<br>";
		echo "Github Link-".$row['githubLink'];
		echo "<br>";
		echo $row['photo'];
		echo "<br>";
		echo "Uploaded on ".$row['date'];
		echo "<br>";
		$tagss=$row['tags'];
		$tag= array_map('intval', explode(',', $tagss));
		$c=count($tag);
		$i=0;
		echo "Tags-";
		while($i<$c)
	 		{
				$query7 = "SELECT * FROM `tags` WHERE id=$tag[$i]";
				$result7 = mysqli_query($con,$query7);
				$row7 = mysqli_fetch_array($result7);
				echo "#".$row7['name']."  ";
				$i++;
				}
			}
		else 
			{ ?>
				<a href="search.php">Select Project</a>	
			<?php	}
		?>

