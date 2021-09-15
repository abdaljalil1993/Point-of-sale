<?php include('header.php'); ?>
<?php include('conn.php'); ?>

<html>

<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-user"></span>enter information</center></h2>
		<hr>
		<form method="POST" action="adduser.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
	
		<div style="height: 10px;"></div>
		<button type="submit" name="adduser" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Create</button>
		<a href="index.php"  class="btn btn-info"><i class="glyphicon glyphicon-backward"></i>Go Back</a>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
		
		</div>
	</div>
</div>
<?php
$username=(isset($_POST['username']))?$_POST['username']:'';
$password=(isset($_POST['password']))?md5($_POST['password']):'';
if(isset($_POST['adduser']))
{
	$sql="insert into user(username,password,access)values('".$username."','".$password."',2)";
	$run=mysqli_query($conn,$sql);
	if(isset($run))
		echo'<script>alert("add user successfully");</script>';
}

?>
<?php include('script.php'); ?>
</body>
</html>