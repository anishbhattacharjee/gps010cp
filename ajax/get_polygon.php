<?php 
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="utf-8"?>';

include 'config.php';

$f=$_GET['fence'];
$point="<poly>";

$sql="select * from geo_fence where fence_id=".$f;
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_assoc($rs);
$latlng=ltrim($rw['points'],"(");
$latlng=rtrim($latlng,")");
$latlng=explode(")(",$latlng);
$i=0;
foreach($latlng as $k=>$l){
$latlng_n[$i]=explode(",",$l);
$point.="<point><lat>".$latlng_n[$i][0]."</lat><lng>".$latlng_n[$i][1]."</lng></point>";
$i++;
}
$point.="</poly>";
echo $point;
//echo "<poly><point><lat>12.672496436545655</lat><lng>75.970458984375</lng></point>
  //  <point><lat>12.693932935851421</lat><lng>77.113037109375</lng></point>
    //<point><lat>11.813588069771273</lat><lng>77.2998046875</lng></point></poly>";
    
    ?>