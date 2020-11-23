<?php
	require 'dbconfig/config.php';
?><html>
<head>
 <link rel ="stylesheet" href ="css/mystyle.css">
<title>Sign up for Doctor</title>
</head>
<body>
<form action="doctor.php" method="post">
<div class ="warp">
<h2>Sign up Here</h2>
   <input name="fullname" type="text" placeholder ="First Name" required autofocus>
   <input name="lastname" type="text" placeholder ="Last Name" required>
   <input name="clinicname" type="text" placeholder ="Clinic Name" required>
   <input name="Email" type="text" placeholder ="Email" required>
   <input name="Specialization" type="text" placeholder ="Specialization" required>
   <input name="password" type="password" placeholder ="Password" required>
   <input name="cpassword" type="password" placeholder ="Confirm Password" required>
   <input type="submit" name="submit_btn" value="Sign Up">
 </div>

<?php
			if(isset($_POST['submit_btn']))
			{
				echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
				
				$fullname = $_POST['fullname'];
				$lastname = $_POST['lastname'];
				$clinicname = $_POST['clinicname'];
				
				$Email = $_POST['Email'];
				$Specialization = $_POST['Specialization'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$encrypted_password = md5($password);
					
					$query= "select * from doctorlogin WHERE fullname='$fullname' and Email='$Email' ";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User or Email id already exists.. try another username or email id") </script>';
					}
					else
					{
						$query= "insert into doctorlogin values('','$fullname','$lastname','$clinicname','$Email','$Specialization','$encrypted_password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
							header('location:logind.php');
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}
				
				
				
				
			}
		?>
</form>
</body>
</html>
