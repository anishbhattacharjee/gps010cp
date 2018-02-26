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
                 <style>

		small img{

*width: 60%;

margin-top: -12px;

padding: 0px;

margin-bottom: -12px;

}

		</style>







				<div class="page-content">



					<div class="page-header position-relative">

						<h1>
							Reports
                        <small>
								<i class="icon-double-angle-right"></i>
                                Select a category
						</small>
                        </h1>

					</div>
                    
                    <div class="span11 infobox-container">
                    


						<div class="row-fluid">
								<div class="widget-box span6">
									<div class="widget-header header-color-blue2">
										<h4 class="lighter smaller">Choose Categories</h4>
									</div>

									<div class="widget-body">
										<div class="widget-main padding-8">
											
                                            
                                             
                    
                    <?php
					$colors=array("success","warning","grey","danger","pink");

foreach($report_cat['data'] as $report_cat){
	$ind= array_rand($colors);
	$color=$colors[$ind];
	//$part1="";
	//if($report_cat['category_type']=='Fleet' && $report_cat['category_id']==1){$part1="&fleet=true"; }
		if( $report_cat['category_type']=='Schoolbus'){ $report_cat['category_type']='Fleet'; }
		else if( $report_cat['category_type']=='Car' || $report_cat['category_type']=='Bike'){ $report_cat['category_type']='Vehicle'; }
			?>
                                                       
                                                        <a href="<?=base_url();?>report/index/<?php echo $id; ?>/1/<?php echo $report_cat['category_id']; ?>" class="btn btn-app no-radius">
                                                            
                                                            <?php echo $report_cat['category_type']; ?>
                                                        </a>
                                               
    
    <?php }?>
											
										</div>
									</div>
								</div>
                         </div>


						
                        </div>




					</div><!--/.page-content-->







			



			</div><!--/.main-content-->



		</div><!--/.main-container-->





	<script src="http://maps.googleapis.com/maps/api/js?key=	AIzaSyCNMfm4IoavTQbIjDH42fNQF31v4BkT8e0&sensor=false">



</script>

	



	



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




		<!--page specific plugin scripts-->







		<!--[if lte IE 8]>



		  <script src="assets/js/excanvas.min.js"></script>



		<![endif]-->







		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>











		<!--ace scripts-->







		<script src="assets/js/ace-elements.min.js"></script>



		<script src="assets/js/ace.min.js"></script>







		<!--inline scripts related to this page-->




		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/jquery.gritter.min.js"></script>
        <script src="assets/js/jquery.hotkeys.min.js"></script>
        

		<script src="assets/js/bootbox.min.js"></script>








</body></html>