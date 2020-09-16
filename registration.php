<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> </head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
            $(document).ready(function() {
               

            
                $('#dob').datepicker({
                        autoclose: true,  
                        format: "dd/mm/yyyy"
                    });  

            });
        </script>
</head>
<body>
<div class="container">
<div class="row" style="margin-top: 4%;">
<div class="col-md-4"></div>
<div class="col-md-4 well">
<h1 class="text-center">Register Here</h1>
	<form action="include/register.php" method="post" name="reg">
		<div class="form-group">
		<label>First Name:</label>
		<input class="form-control" type="text" name="firstname" required="" />
		</div>

        <div class="form-group">
		<label>Last Name:</label>
		<input class="form-control" type="text" name="lastname" required="" />
		</div>

		
		<div class="form-group">
		<label>Email:</label>
		<input class="form-control" type="email" name="uemail" id="uemail" required="" />
		</div>
		<div class="form-group">
		<label>Password:</label>
		<input class="form-control" type="password" name="upass" required="" />
		</div>
        <div class="form-group">
		<label>Date Of Birth:</label>
        <input  class="form-control" type="text" placeholder="click to show datepicker" name="dob"  id="dob" required="">
		
		</div>

		<button class="btn btn-primary" type="submit" name="register">Register</button>
		<a href="login.php">Already registered! Click Here!</a></td>
	</form>
	<br>
	<?php 
	// Show any error or success message 
		if(isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
            // session_unset($_SESSION['msg']);
            $_SESSION['msg'] = "";
		}
	?>
</div>
<div class="col-md-4"></div>
</div> <!-- End row -->
</div> <!-- End container -->
</body>
</html>
