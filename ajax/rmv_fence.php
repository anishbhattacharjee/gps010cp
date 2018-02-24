<?php

include 'config.php';
$id=$_GET['fence'];
$sql="delete from geo_fence where fence_id=$id";
$rs=mysqli_query($con,$sql);
if($rs!=FALSE){echo "success";}
else{echo "error";}

?>