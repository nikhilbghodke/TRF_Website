<?php
 if(isset($_POST['submit']))
	{
		include("dbcon.php");
		$id3=uniqid();
		
		$title=$_POST['title'];
		$status=$_POST['status'];
		$description=$_POST['description'];
		$link=$_POST['link'];
		$date=$_POST['date_1'];
		$imgname=$_FILES['img']['name'];
		$tempname=$_FILES['img']['tmp_name'];
		$str="";
		$string="";
		$i1=0;
		while(TRUE)
		{
			
			if(isset($_POST["name"][$i1]))
			{
		$tag=$_POST["name"][$i1];
		
		$query="SELECT * FROM `tags` WHERE `name`='$tag'";
		
		$rn=mysqli_query($con,$query);
		$row=mysqli_num_rows($rn);
		if ($row>0)
		{
			$number=0;
			while($row=mysqli_fetch_assoc($rn))
			{$number++;
				$id=$row['id'];
			
			$str=$str.$id.',';
			
			}
			
		}
		else{
			echo "<script>alert('$tag' +' not found in database')</script>";
		}
		
			}
		else
		{
		 
		 break;
		}
		$i1++;
		}
			
		
		
		
	
		for($i=0;$i<6;$i++)
		{
			
			if(isset($_POST["team"][$i]))
			{
			
			$member=$_POST["team"][$i];
			$qry="SELECT * FROM `users` WHERE `Name`='$member'";
			$run=mysqli_query($con,$qry);
			$row1=mysqli_num_rows($run);
			
			if ($row1>0)
		{
			$count=0;
			while($rw=mysqli_fetch_assoc($run))
			{
			$count++;	
			$mid=$rw['id'];
			
			$string=$string.$mid.',';
			}
		
		}
		else{
			echo "<script>alert('$member' +' not found in database')</script>";
			
		}
			}
		
		}
		if($str!="" AND $string!="")
		{
		move_uploaded_file($tempname,"./images/$imgname");
		$q1="INSERT INTO `project`(`id`, `title`,`Description`, `status`, `githubLink`, `photo`,`teammember`,`date`,`tags`) VALUES ('$id3','$title','$description','$status','$link','$imgname','$string','$date','$str')";
		
		$r1=mysqli_query($con,$q1);
		
		}
		else
			echo "Please enter the values";
	}
	
	?>