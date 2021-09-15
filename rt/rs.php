<?php
session_start();
if($_SESSION['type']!=1)
    header("location:../login.php");

include'../conn.php';
$x1='';
if (isset($_GET['id'])) 
   $x1=$_GET['id'];

$r1=mysqli_query($con,"select * from user where uid='$x1' and type=2");
$dd=mysqli_fetch_array($r1);
if(isset($_GET['course']))
    $co=$_GET['course'];


$a1=$dd['uname'];
$a2=$dd['uid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="jquery.rateyo.css">
</head>
<body style="background-color: #cfcfcf;">
<div class="container">
            <h1 class="text-center text-info">Students Rating System   </h1>

<form action="rs.php?id=<?php echo $x1; ?>&course=<?php echo $co; ?>" method="post">
        <div style="margin: 100px auto;width: 500px;height: 300px;background-color: #fafafa; border-radius: 10px;padding: 20px;border:2px solid #000;">
        <h1 class="text-center text-info">rate student : <?php echo $dd['name'] .'  '.$dd['uid'];  ?> </h1>
        <hr>
    <div class="rateyo"
         data-rateyo-rating="0"
         data-rateyo-num-stars="5"
         data-rateyo-score="4"></div>
         
         <span class='result'>0</span>
         <input id="s" type="hidden" class="r" name="r">
         <hr>

         <input type="submit" name="rate" class="btn btn-primary btn-block" value="rate student">

         <a href="../teacher/EvaluationStudent.php">go back</a>
</div> 
</form>

</div>
<?php
$x=isset($_POST['r'])?$_POST['r']:'';
$sname=$dd['name'];
$sid=$dd['uid'];
$un=$dd['uname'];
$tname=$_SESSION['name'];
$tuid=$_SESSION['uid'];
$tuname=$_SESSION['uname'];
$x=floatval(str_replace(',', '.', $x));

if(isset($_POST['rate']))
{
$t=mysqli_query($con,"select * from ratestudent where cid='$co' and suid='$sid'");
if(mysqli_num_rows($t)>0)
{
echo'<script> alert("student rate is allready taken");</script>';
}
else{
       $z=mysqli_query($con,"insert into ratestudent(sname,suid,suname,tname,tuid,rate,cid)values
    ('$sname','$a2','$a1','$tuname','$tuid','$x','$co')");

if (isset($z)) {
   echo'<script> alert("rate student done...!");</script>';
}
 
}

}

?>


<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="jquery.rateyo.js"></script>

<script type="text/javascript">
	

	$(function () {
  $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
    var rating = data.rating;
  
    $(this).parent().find('.result').text('rating :'+ rating);
 
     $(this).parent().find('.r').attr('value',rating);
   });
});
</script>
</body>
</html>