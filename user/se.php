<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('../conn.php'); ?>
<html>
<head>
	<style type="text/css">
		.s input{
			float: left;
			width: 40%;
			margin-right: 20px;
			margin-top: 10px;
		}
		.s{
			
			margin: 80px auto;
			width: 800px;
			height: 130px;
		}
	</style>
</head>
<body>

	

		<form method="POST" action="se.php">
			<div class="s">
		 <input type="text" placeholder="Camera" name="cam" class="form-control" >
			
	 <input type="text" placeholder="Proccess" name="pro" class="form-control" > 
	 <button style="margin-top: 9px; width: 100px;" class="btn btn-info" name="ss" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
	 <h1 class="text-info" style="margin-left: 200px;">Special Search Page</h1>
		</div>

		</form>
		
		<?php
$camera=(isset($_POST['cam']))?$_POST['cam']:'';
$proccess=(isset($_POST['pro']))?$_POST['pro']:'';
if(isset($_POST['ss']))
{
	if(empty($camera) and !empty($proccess))
	{

$query=mysqli_query($conn,"select * from `product` where proccess like '%$proccess%' ");

		if(mysqli_num_rows($query) > 0)
		{
		?>
<div>
	<?php
		$inc=4;
		while($row=mysqli_fetch_array($query)){
			
			$inc = ($inc == 4) ? 1 : $inc+1; 
			if($inc == 1) echo "<div class='row'>";  
			
			?>
				<div class="col-lg-3">
				<div>
					<img src="../<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
					<div style="height: 10px;"></div>
					<div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['product_name']; ?></div>
					<div style="height: 10px;"></div>
					<div style="display:none; position:absolute; top:210px; left:10px;" class="well" id="cart<?php echo $row['productid']; ?>">Qty: <input type="text" style="width:40px;" id="qty<?php echo $row['productid']; ?>"> <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
					<div style="margin-left:17px; margin-right:17px;">

						<button type="button" class="btn btn-primary btn-sm addcart glyphicon glyphicon-search " value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Add to Cart</button>


						 <span class="pull-right"><strong><?php echo number_format($row['product_price'],2); ?></strong></span>
					</div>
				</div>
				</div>
			<?php
		if($inc == 4) echo "</div><div style='height: 30px;'></div>";
		
		if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 3) echo "<div class='col-lg-3'></div></div>"; 
	}



	 }}


		elseif(!empty($camera) && empty($proccess))
						{$query=mysqli_query($conn,"select * from `product` where camera like '%$camera%' ");

		if(mysqli_num_rows($query) > 0)
		{
		?>
<div>
	<?php
		$inc=4;
		while($row=mysqli_fetch_array($query)){
			
			$inc = ($inc == 4) ? 1 : $inc+1; 
			if($inc == 1) echo "<div class='row'>";  
			
			?>
				<div class="col-lg-3">
				<div>
					<img src="../<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
					<div style="height: 10px;"></div>
					<div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['product_name']; ?></div>
					<div style="height: 10px;"></div>
					<div style="display:none; position:absolute; top:210px; left:10px;" class="well" id="cart<?php echo $row['productid']; ?>">Qty: <input type="text" style="width:40px;" id="qty<?php echo $row['productid']; ?>"> <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
					<div style="margin-left:17px; margin-right:17px;">

						<button type="button" class="btn btn-primary btn-sm addcart glyphicon glyphicon-search " value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Add to Cart</button>


						 <span class="pull-right"><strong><?php echo number_format($row['product_price'],2); ?></strong></span>
					</div>
				</div>
				</div>
			<?php
		if($inc == 4) echo "</div><div style='height: 30px;'></div>";
		}
		if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 3) echo "<div class='col-lg-3'></div></div>"; 
	}
						}



						elseif(!empty($camera) and !empty($proccess)){
							$query=mysqli_query($conn,"select * from `product` where camera like '%$camera%' and  proccess like '%$proccess%' ");

		if(mysqli_num_rows($query) > 0)
		{
		?>
<div>
	<?php
		$inc=4;
		while($row=mysqli_fetch_array($query)){
			
			$inc = ($inc == 4) ? 1 : $inc+1; 
			if($inc == 1) echo "<div class='row'>";  
			
			?>
				<div class="col-lg-3">
				<div>
					<img src="../<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
					<div style="height: 10px;"></div>
					<div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['product_name']; ?></div>
					<div style="height: 10px;"></div>
					<div style="display:none; position:absolute; top:210px; left:10px;" class="well" id="cart<?php echo $row['productid']; ?>">Qty: <input type="text" style="width:40px;" id="qty<?php echo $row['productid']; ?>"> <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
					<div style="margin-left:17px; margin-right:17px;">

						<button type="button" class="btn btn-primary btn-sm addcart glyphicon glyphicon-search " value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Add to Cart</button>


						 <span class="pull-right"><strong><?php echo number_format($row['product_price'],2); ?></strong></span>
					</div>
				</div>
				</div>
			<?php
		if($inc == 4) echo "</div><div style='height: 30px;'></div>";
		}
		if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 3) echo "<div class='col-lg-3'></div></div>"; 
		}


						}




						else
							{
								echo'<div style="width:600px; text-align:center;margin:3px auto;height:150px;border:1px solid #030303;border-radius:30px;background-color:#eaeee9;">
								<h1 class="text-info" style="margin-left:40px;  width:500px;">please enter keyword to search for it </h1></div>';
							}



	
}##button

?>
	

<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
</body>