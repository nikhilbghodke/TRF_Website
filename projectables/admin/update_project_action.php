<?php
										include("dbcon.php");
										
										session_start();
										$id1=$_SESSION['id'];// set a variable for original id of project
										
										$str5=$_POST['team'];
										
										//array Of teammembers
										$str6=$_POST['name'];//array of tagnames
										$str7=implode(',',$str5);
										
										
										//conversion to string
										$str8=implode(',',$str6);
							
										
										$str3="";
										$str4="";
										
										
										
										
										if(isset($_POST['submit']))
										{
										
										$names=explode(',',$str7);//array of  teammember names separated by commas
								
										$tagsname=explode(',',$str8);//array of tag names separated by comma
									
		
									$title=$_POST['title'];
									$status=$_POST['status'];
									$id4=$_POST['pro_id'];
									$link=$_POST['link'];
									$date=$_POST['date_1'];
									$imgname=$_FILES['img']['name'];
									$tempname=$_FILES['img']['tmp_name'];
										for($i=0;$i<count($names);$i++)
										{
											$qry2="SELECT * FROM `users` WHERE `Name`='$names[$i]'";
											$run3=mysqli_query($con,$qry2);
											$row2=mysqli_num_rows($run3);
												if ($row2>0)
										{
											$num3=0;
											while($rows=mysqli_fetch_assoc($run3))
													{$num3++;
											$idstring=$rows['id'];//to fetch ids of users
											
			
												$str3=$str3.$idstring.',';//string of ids of teammmembers
												
			
													}
										}
										else{
											echo "<script>alert('$names[$i]' +' not found in database')</script>";
			
		}
										}
										
										for($j=0;$j<count($tagsname);$j++)
										{
											$qry3="SELECT * FROM `tags` WHERE `name`='$tagsname[$j]'";
											$ru=mysqli_query($con,$qry3);
											$ro=mysqli_num_rows($ru);
												if ($ro>0)
										{
											$num4=0;
											while($rows1=mysqli_fetch_assoc($ru))
													{$num4++;
											$idtag=$rows1['id'];//to fetch ids of tags
											
			
												$str4=$str4.$idtag.',';//string of ids of tags
												
													}
										}
										else{
											if($tagsname[$j]!="")
											echo "<script>alert('$tagsname[$j]' +' not found in database')</script>";
										}
										}
										move_uploaded_file($tempname,"./images/$imgname");
										if($str3!="" AND $str4!="")
										{$qry3="UPDATE `project` SET `id`='$id4',`title`='$title',`status`='$status',`githubLink`='$link',`photo`='$imgname',`teammember`='$str3',`date`='$date',`tags`='$str4' WHERE  `id`='$id1'";
										$torun=mysqli_query($con,$qry3);
										if($torun==TRUE)
											echo "Data inserted Successfully;";
										else
										echo "failed";
									
										}
											
										}		
									?>
									