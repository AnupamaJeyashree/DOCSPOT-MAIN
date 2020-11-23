<?php
	session_start();
	require 'dbconfig/config.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form for Doctor</title>
	<link rel="stylesheet" href="css/styled.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
</head>
<body>


<div class="wrapper">
  <div class="loginform">
      <div class="title">
          Login 
      </div>
      <form class="myform" action="logind.php" method="post">
      <div class="input-form username">
          <input name="fullname" type="text" class="input" placeholder="Username" required>
          <i class="fas fa-user"></i>
      </div>
      <div class="input-form email">
          <input name="Email" type="text" class="input" placeholder="Email address" required>
          <i class="fas fa-at"></i>
      </div>
      <div class="input-form password">
          <input name="password" type="password" class="input" placeholder="Password" required>
          <i class="fas fa-key"></i>
      </div>
      
       
        <center><button type="submit" class="btn" name="login">Login</button></center>
        
      
  
</div>
</form>
<?php
		if(isset($_POST['login']))
		{
			$fullname=$_POST['fullname'];
 			$Email=$_POST['Email'];
			$password=$_POST['password'];
			$encrypted_password = md5($password);
			
			$query="select * from doctorlogin WHERE fullname='$fullname' AND password='$encrypted_password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				// valid
				$_SESSION['fullname']= $fullname;
				header('location:homepage1.php');
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>	
</div>	
</body>
</html>
