<?php 
include 'config.php';
//print_r($_FILES);
//echo "<br><br>";
//print_r($_REQUEST);
if($_FILES["image"]){
	
	 if ($_FILES["image"]["error"] > 0)
		{$img="avatar5.png";}
	  else
		{ 
			 $img=$_FILES["image"]["name"];
			  move_uploaded_file($_FILES["image"]["tmp_name"],
			  "../../gps/modeluploads/" . $_FILES["image"]["name"]);   
		}
$sql="UPDATE installation SET image='".$img."' WHERE instatllation_id=".$_REQUEST['pk'];
$rs=mysqli_query($con,$sql);

	
}
else{

$sql="UPDATE installation SET ".$_REQUEST['name']."='".$_REQUEST['value']."' WHERE instatllation_id=".$_REQUEST['pk'];

$rs=mysqli_query($con,$sql);

}



//echo $sql;	





?>