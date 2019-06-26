<?php
 include("dbcon.php");
 session_start();
 $_SESSION['id']=$_GET['sid'];// to get original id of project passed from edit_project.php and set it as sesssion variable;
 $sid=$_GET['sid'];
 $sql="SELECT * FROM `project` WHERE `id`='$sid'";
 $run=mysqli_query($con,$sql);
 $data=mysqli_fetch_assoc($run);//fetch the associative array satisfying query

										
										
 
 ?>
<html>  
      <head>  
           <title>Dynamically Add or Remove input fields in PHP with JQuery</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <h2 align="center">Welcome to the admin Page</h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name" action="update_project_action.php" method="post" enctype="multipart/form-data">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field"> 
							   	 <?php
										include("dbcon.php");
										$string=$data['teammember'];
										$tag1=$data['tags'];
										$str2="";
										$str1="";
										$str3="";
										$str4="";
										$ids = explode(',' ,$string);
										$tg=explode(',' ,$tag1);
										
										foreach($ids as $value)
										{
											$q2="SELECT * FROM `users` WHERE `id`='$value'";
											$runn=mysqli_query($con,$q2);
											$row=mysqli_num_rows($runn);
												if ($row>0)
										{
											$number=0;
											while($row=mysqli_fetch_assoc($runn))
													{$number++;
											$name=$row['Name'];
			
												$str2=$str2.$name.',';//string of ids of users
			
													}
										}
										}
										foreach($tg as $val)
										{
											$qrry="SELECT * FROM `tags` WHERE `id`='$val'";
											$runn2=mysqli_query($con,$qrry);
											$row1=mysqli_num_rows($runn2);
												if ($row1>0)
										{
											$num=0;
											while($rows=mysqli_fetch_assoc($runn2))
													{$num++;
											$tagname=$rows['name'];
											
			
												$str1=$str1.$tagname.',';//string of ids of tag names
												
			
													}
													
										}
										}
									?>
									
									<tr>  
                                         <td><input type="text" name="team[]"  value="<?php  echo $str2;?>"  class="form-control name_list" required></td>  
                                         </tr>
									
                                   
								 </table>
								 <table class="table table-bordered" id="dynamic_field_tag"> 
									<tr>  
                                         <td><input type="text" name="name[]"  value= "<?php  echo $str1;?>"  class="form-control name_list" required></td>  
                                           </tr>
                                   
								 </table>
								 <table class="table table-bordered">
									
									<tr>
										<td>Title of the project</td><td><input type="text" name="title" value="<?php echo $data['title'];?>"  required></td>
									</tr>
									<tr>
										<td>Description of project</td><td><input type="text" name="description"  value="<?php echo $data['Description'];?>"  required></td>
									</tr>
									<tr>
			                            <td>Current Status </td><td><input type="radio" name="status" label="ongoing" value="ongoing" required 
										<?php if(strcmp($data['status'],'ongoing')==0){echo "checked";}?>
										>Ongoing</td><td><input type="radio" name="status" label ="completed" value="completed" required  
										<?php if(strcmp($data['status'],'completed')==0){echo "checked";}?> 
										>Completed</td>
		                            </tr>
									<tr>
			<td>Date: </td><td><input type="date" name="date_1"value=<?php echo $data['date'];?> required></td>
		</tr>
		<tr>
			<td>Projectid:</td><td><input type="text" name="pro_id" value="<?php echo $data['id'];?>" required></td>
		</tr>
		
		<tr>
			<td>Githublink:</td><td><input type="text" name="link" value=<?php echo $data['githubLink'];?> ></td>
		</tr>
		<tr>
			<td>Photo:</td><td><input type="file" name="img"value=<?php echo $data['photo'];?> ></td>
		</tr>
                               </table>  
                               <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html> 

									
 <script>  
 $(document).ready(function(){  
      var i=1;  
      var j=1;
	  $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="team[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      }); 
		$('#add_tag').click(function(){  
           j++;  
           $('#dynamic_field_tag').append('<tr id="row'+j+'"><td><input type="text" name="name[]" placeholder="Enter your tag" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn_remove_tag">X</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
	$(document).on('click', '.btn_remove_tag', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
 
	 