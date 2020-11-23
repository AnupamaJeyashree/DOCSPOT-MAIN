<?php
	session_start();
?>
<!DOCTYPE html>
<html>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <head>
        <title>DocSpot</title>
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
    </head>
    
    <body>
        
        <ul>
          <li style="font-size:20px;">
            <a href="http://localhost/DoctorSignupLogin1/logind.php">Sign out</a>
            
          </li>
        </ul>
        <div class="wrapper">
        <div class="title">
          <h1>DocSpot</h1>
        </div>
        <form style="border:2px solid #ccc">
	<center><br/>
			
			<h1>Welcome
				<?php echo $_SESSION['fullname']?>
			</h1>
			
		</center>
        <div id="container">
            <table style="font-size: 35px;">
              
                <tr><td colspan="2" id='tdata'><a href="#">Manage Appointments</a></td></tr>
                <tr><td colspan="2" id='tdata'><a href="http://localhost/Viewcalender/calendar.php">View Calendar</a></td></tr>
                <tr><td colspan="2" id='tdata'><a href="http://localhost/UploadRecords/upload_rec.php">Upload Patient Report</a></td></tr>
            </table>
        </div>
        </div>
        </form>
<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:loginh.php');
			}
		?>
	</div>

    </body>

</html>
