<?php include 'include/adminassets.php';?>
<?php include 'include/header.php';?>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
function initialize()
{
var mapProp = {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap")
  ,mapProp);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<style>
.tooltip{
   			display: inline;
    		position: relative;
		}
		
		.tooltip:hover:after{
    		background: #333;
    		background: rgba(0,0,0,.8);
    		border-radius: 5px;
    		bottom: 26px;
    		color: #fff;
    		content: attr(title);
    		left: 20%;
    		padding: 5px 15px;
    		position: absolute;
    		z-index: 98;
    		width: 220px;
		}
		
		.tooltip:hover:before{
    		border: solid;
    		border-color: #333 transparent;
    		border-width: 6px 6px 0 6px;
    		bottom: 20px;
    		content: "";
    		left: 50%;
    		position: absolute;
    		z-index: 99;
		}
</style>

	
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/adminsidebar.php';?>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active">Gps</li>
					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off">
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
				    <div class="row-fluid">
				    <div class="span12">

  
  	
	  <div id="googleMap" style="width:100%;height:380px;"></div>
 
    
  	
	  <div id="myown"style="width:100%;height:250px;">
	  	<div class="span12">
									<table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													Sl.No
												</th>
												<th>Device Name</th>
												<th>Device ID</th>
												<th>Imie No.</th>
												<th>Date Time</th>
												
												<th class="hidden-480">Lattitude</th>

												<th class="hidden-phone">
													Longitude
												</th>
												<th class="hidden-480">Speed</th>
												<th class="hidden-480">Status</th>

												<th>Location Info</th>
											</tr>
										</thead>

										<tbody>
				<tr>
				<td class="center">	1</td>
				<td><a href="#">Vehicle 1</a></td>
				<td>KA-03 6757</td>
				<td>12335484328985</td>
				<td><?php echo date('d-m-Y h:m:i');?></td>
				<td class="hidden-480">57.16546</td>
				<td class="hidden-phone">72.321568</td>
				<td class="hidden-phone">40KM/HR</td>
				<td class="hidden-480">	<span class="label label-important ">In Active</span></td>
				<td class="hidden-480">	Banashankari </td>

				</tr>
				
				<tr>
				<td class="center">	2</td>
				<td><a href="#">Vehicle 2</a></td>
					<td>KA-03 6757</td>
				<td>12335484328985</td>
					<td><?php echo date('d-m-Y h:m:i');?></td>
				<td class="hidden-480">57.16546</td>
				<td class="hidden-phone">72.321568</td>
				<td class="hidden-phone">60KM/HR</td>
				<td class="hidden-480">	<span class="label label-success">Active</span></td>
				<td class="hidden-480"> Vijayanagar </td>

				</tr>
				
				<tr>
				<td class="center">	3</td>
				<td><a href="#">Vehicle 3</a></td>
					<td>KA-03 6757</td>
				<td>12335484328985</td>
					<td><?php echo date('d-m-Y h:m:i');?></td>
				<td class="hidden-480">57.16546</td>
				<td class="hidden-phone">72.321568</td>
				<td class="hidden-phone">50KM/HR</td>
				<td class="hidden-480">	<span class="label label-success">Active</span></td>
				<td class="hidden-480"> Jaynagar </td>

				</tr>
				
				<tr>
				<td class="center">4</td>
				<td><a href="#">Vehicle 4</a></td>
					<td>KA-03 6757</td>
				<td>12335484328985</td>
					<td><?php echo date('d-m-Y h:m:i');?></td>
				<td class="hidden-480">57.16546</td>
				<td class="hidden-phone">72.321568</td>
				<td class="hidden-phone">65KM/HR</td>
				<td class="hidden-480">	<span class="label label-important">In Active</span></td>
				<td class="hidden-480"> Jp Nagar </td>

				</tr>
				
				<tr>
				<td class="center">5</td>
				<td><a href="#">Vehicle 5</a></td>
					<td>KA-03 6757</td>
				<td>12335484328985</td>
					<td><?php echo date('d-m-Y h:m:i');?></td>
				<td class="hidden-480">57.16546</td>
				<td class="hidden-phone">72.321568</td>
				<td class="hidden-phone">70KM/HR</td>
				<td class="hidden-480">	<span class="label label-important">In Active</span></td>
				<td class="hidden-480"> Btm Layout </td>

				</tr>

										
										</tbody>
									</table>
								</div>

</div>
</div>
  </div><!--/.page-content-->

			
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

	


</body></html>
