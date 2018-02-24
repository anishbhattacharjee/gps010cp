
<link rel="stylesheet" type="text/css" href="http://www.keenthemes.com/preview/metronic/theme/assets/global/css/components.css" />
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

					
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
<!-- BEGIN PAGE CONTENT-->
	<div class="tiles">
				<div class="tile selected double-down bg-blue-hoki">
					<div class="tile-body">
						<i class="icon-bell-alt"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Notifications
						</div>
						<div class="number">
							 6
						</div>
					</div>
				</div>
				<div class="tile selected double bg-grey-cascade tile_rand">
					<div class="tile-body">
						<i class=" icon-globe"></i>
						<h3>Map</h3>
						<p>
							 
						</p>
					</div>
					<div class="tile-object">
						<div class="name">
							
						</div>
						<div class="number">
							 10:45PM, 23 Jan
						</div>
					</div>
				</div><div class="tile selected bg-red-sunglo tile_rand">
					<div class="tile-body">
						<i class="icon-eye-open"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Live Track
						</div>
						<div class="number">
							 12
						</div>
					</div>
				</div>
				<div class="tile selected bg-green-meadow tile_rand">
					<div class="tile-body">
						<i class="icon-facetime-video"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Route Playback
						</div>
						<div class="number">
							 12
						</div>
					</div>
				</div><div class="tile selected bg-blue-steel tile_rand">
					<div class="tile-body">
						<i class="icon-hand-down"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Geofence
						</div>
						<div class="number">
							 124
						</div>
					</div>
				</div><div class="tile selected bg-purple-studio tile_rand">
					<div class="tile-body">
						<i class="icon-bar-chart"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Reports
						</div>
						<div class="number">
							 121
						</div>
					</div>
				</div><div class="tile selected bg-yellow-saffron tile_rand">
					<div class="corner">
					</div>
					<div class="tile-body">
						<i class="icon-cogs"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							 Settings
						</div>
						<div class="number">
							 452
						</div>
					</div>
				</div><div class="tile selected bg-green-turquoise tile_rand">
					<div class="corner">
					</div>
					<div class="check">
					</div>
					<div class="tile-body">
						<i class="icon-info-sign"></i>
					</div>
					<div class="tile-object">
						<div class="name">
							Support
						</div>
						<div class="number">
							 14
						</div>
					</div>
				</div><div class="tile selected double bg-blue-madison tile_rand">
					<div class="tile-body">
						<i class="icon-user"></i>
						<h4>Profile</h4>
						
					</div>
					<div class="tile-object">
						<div class="name">
							 Bob Nilson
						</div>
						<div class="number">
							 24 Jan 2013
						</div>
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
			</div>
			<!-- END PAGE CONTENT-->
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
		<script>
$(function(){
	var cards = $(".tile_rand");
	for(var i = 0; i < cards.length; i++){
	    var target = Math.floor(Math.random() * cards.length -1) + 1;
	    var target2 = Math.floor(Math.random() * cards.length -1) +1;
	    cards.eq(target).before(cards.eq(target2));
	}
});
</script>
	</body>
</html>
