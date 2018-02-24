
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



					<div class="page-header position-relative">

						<h1>

							Sical Temperature Alert Settings

                        </h1>

					</div>
                    
  <link rel="stylesheet" href="assets/css/bootstrap-editable.css" />
                
  
                                
<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

						  <div class="row-fluid">
								
							

							  <table id="sample-table-2" class="table table-striped table-bordered table-hover">
								  <thead>
									  <tr>
										  
										 <th>Sl No</th>
                                         <th>Vehicle</th>
										 <th>Threshold Temperature (&deg;C)</th>
                                         <th>Email</th>			
                                         <th>Phone</th>			
										 
									  </tr>
								  </thead>

								  <tbody id="reading_data">
									
                                      
                                      <?php $i=1;$sql="select ifnull(b.temperature,0) as temperature,b.email,b.phone,i.device_name,i.imie_no from installation i left join sical_temp b on b.imei=i.imie_no  where i.customer_id=$id";
									  		$rs=mysql_query($sql);
											while($sical=mysql_fetch_assoc($rs)){?>
                                        <tr>									  

										  <td>
											 <?php echo $i; ?>
										  </td>
                                           <td>
											 <?php echo $sical['device_name']; ?>
										  </td> 
										  <td class="editable" id="edt_<?php echo $sical['imie_no']; ?>" data-imei="<?php echo $sical['imie_no']; ?>" data-spl="temperature">
											 <?php echo $sical['temperature']; ?>
										  </td> 
                                          <td  class="editable" id="edt_<?php echo $sical['imie_no']; ?>" data-imei="<?php echo $sical['imie_no']; ?>" data-spl="email">
											 <?php echo $sical['email']; ?>
										  </td>
										  <td  class="editable" id="edt_<?php echo $sical['imie_no']; ?>" data-imei="<?php echo $sical['imie_no']; ?>" data-spl="phone">
											 <?php echo $sical['phone']; ?>
										  </td>										
									  </tr>

<?php $i++;} ?>
								

								  </tbody>
							  </table>
							</div>
                            
							</div><!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div>
                    </div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

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
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<!--ace scripts-->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript" src="assets/js/x-editable/bootstrap-editable.min.js"></script>

		<script type="text/javascript" src="assets/js/x-editable/ace-editable.min.js"></script>

   <script type="text/javascript">
			$(function() {				
				
				$("#reading_data").editable({       
					   selector: '[id^="edt_"]',
			           url: 'ajax/sical_temp.php',
			           send: 'always',
			           mode:'inline',
					   params: function(params) {							
							params.imei = $(this).editable().data('imei');
							params.spl = $(this).editable().data('spl');
							return params;
						}
							
			    });
				
				var oTable1 = $('#sample-table-2').dataTable( {
				} );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			});
		</script>

</body></html>