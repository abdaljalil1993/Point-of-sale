<?php include('header.php'); ?>
<?php
	session_start();
	
	if (isset($_SESSION['id'])){
		$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);
		
		if ($row['access']==1){
			header('location:admin/');
		}
		else{
			header('location:user/');
		}
	}
?>
<html>

<body  style="background-color: #1a3344">
<div class="container">
	<div id="login_form" class="well" style="border-radius: 20px; background-color: rgba(255,255,255,1);">
		<h2 style="color: gold"><center><span class="glyphicon glyphicon-lock"></span > Please Login</center></h2>
		<hr>
		<form method="POST" action="login.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn" style="background-color: #1a3344;color: gold"><span class="glyphicon glyphicon-log-in"></span> Login</button>
		
		<a style="font-size: 18px;text-decoration: none;color: gold" href="adduser.php"> create acount</a>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>