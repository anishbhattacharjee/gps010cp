<?php
	$d_time=0;
	$i_time=0;
	$distance=0;


$date= date("Y-m-d H:i:s");
$start=(isset($_POST['frmdate']) && isset($_POST['frmtime']))?date("Y-m-d H:i:s",strtotime($_POST['frmdate']." ".$_POST['frmtime'])):date('Y-m-d H:i:s', strtotime($date .' -1 day'));;
//$start=date("Y-m-d H:i:s",strtotime($start));

$end=(isset($_POST['todate']) && isset($_POST['frmtime']))?date("Y-m-d H:i:s",strtotime($_POST['totime']." ".$_POST['totime'])):$date;
//$end=date("Y-m-d H:i:s",strtotime($end));



$vid=(isset($_POST['vid']))?$_POST['vid']:false;
$id=(isset($_POST['vid']))?$_POST['cid']:$id;

if($vid){
	
}

//echo $start;
	


?>
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



					




<style>
.legend {
width: 10px;
vertical-align: middle;
height: 10px;
display: inline-block;
}
.noDataAvailable {
background-color: #ccc;
}
.over {
background-color: #d49f0b;
}
.under {
background-color: #23a0d5;
}
.stats{
	font-size: .6em;
color: #808080;
font-weight: bold;
margin: 5px 0;
list-style:none;
}
h6{
font-size: .9em!important;
color: #999494;
text-transform: uppercase;
font-weight: bold;
font-family: "Gill Sans","Gill Sans MT",Calibri,sans-serif;
}
</style>
<div id="result">

				<div class="row-fluid">
						<div class="span12" id="rsdiv">
                       		<div class="span3">
                            	<h1>Summary</h1>
                                <ul class="stats">
                                    <li><span class="legend over"></span><span> OVER
                                    </span><span id="overCount">(2)</span></li>
                                    <li><span class="legend under"></span><span> UNDER
                                    </span><span id="underCount">(0)</span></li>
                                    <li><span class="legend noDataAvailable"></span><span>
                                            NO DATA AVAILABLE
                                    </span></li>
                                </ul>
                            </div>
                            
                        	<div class="span3 rs">
                            <h6>Drive Time</h6>
                                            <div class="easy-pie-chart percentage" id="percentage1" data-id="1" data-percent="20" data-color="#D15B47" data-rel="popover" data-placement="bottom" title="Some Info" data-content="">
												<span class="percent" id="percent1">20</span>
												%
											</div>
                                           
							</div>
                        	<div class="span3 rs">
                             <h6>Distance Travelled</h6>
											<div class="easy-pie-chart percentage" id="percentage2" data-id="2" data-percent="55" data-color="#87CEEB">
												<span class="percent" id="percent2">55</span>
												%
											</div>
							</div>
                        	<div class="span3 rs">
                             <h6>Idle Time</h6>
											<div class="easy-pie-chart percentage" id="percentage3" data-id="3" data-percent="90" data-color="#87B87F">
												<span class="percent" id="percent3">90</span>
												%
											</div>
							</div>
                            
                            
                            <div class="span9" id="result_bar1" style="display:none;">
                            <h6>Drive Time</h6>
											<div class="progress">                                           
												<div class="bar bar-success" style="width: 35%;"></div>

												<div class="bar bar-warning" style="width: 20%;"></div>

												<div class="bar bar-danger" style="width: 10%;"></div>
											</div>
							</div>
                            
                            <div class="span9" id="result_bar2" style="display:none;">
                            <h6>Distance Travelled</h6>
                                            <div class="progress">
												<div class="bar bar-success" style="width: 35%;"></div>

												<div class="bar bar-warning" style="width: 20%;"></div>

												<div class="bar bar-danger" style="width: 10%;"></div>
											</div>
							</div>
                            
                            <div class="span9" id="result_bar3" style="display:none;">
                            <h6>Idle Time</h6>
                                            <div class="progress">
												<div class="bar bar-success" style="width: 35%;"></div>

												<div class="bar bar-warning" style="width: 20%;"></div>

												<div class="bar bar-danger" style="width: 10%;"></div>
											</div>
							</div>

                            
                            
                        </div>
                 </div>          



</div><!--/result-->




					</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<!--basic scripts-->



		<link rel="stylesheet" href="assets/css/datepicker.css" />

		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />




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
		<!--inline scripts related to this page-->
		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/jquery.gritter.min.js"></script>
        <script src="assets/js/jquery.hotkeys.min.js"></script>
        <script src="assets/js/jquery.easy-pie-chart.min.js"></script>

		<script src="assets/js/bootbox.min.js"></script>

		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>

		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>

		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">



/*			function v_d_d_r_submit(){

				var postData=$("#v_d_d_r").serializeArray();//alert(postData);

                var formURL = "ajax/<?php   echo $report['report_link']; ?>.php";

				$("#load_spin").show();

				$.ajax(

						{

							url : formURL,

							type: "POST",

							data : postData,						

							success:function(response, textStatus, jqXHR) 

							{$("#load_spin").hide();

								//alert(response);
								$('#collapse_search').click();
								//if(!($( "#sidebar" ).hasClass( "menu-min" ))){$(".sidebar-collapse").click();}
								$(".page-header").hide();
								$("#breadcrumbs").hide();
								//$(".main-content").css("margin-left","30px");
								$("#result").html(response);
								
								
								

							},

							error: function(jqXHR, textStatus, errorThrown) 

							{

								$("#load_spin").hide();

								   alert("Change a few things up and try submitting again.");

							}

						});

				

			}
*/
		</script>

        

        		<script>



	$(function(){
		//$("#overview").submit();
		//$("#result_bar").hide();
		
		

		$('.date-picker').datepicker().next().on(ace.click_event, function(){

					$(this).prev().focus();

				});

				$('#timepicker1').timepicker({

					minuteStep: 1,

					showSeconds: true,

					showMeridian: false

				})

				$('#timepicker2').timepicker({

					minuteStep: 1,

					showSeconds: true,

					showMeridian: false

				})

				

						 

				var d=new Date();

				var day=d.getDate();

				var month=d.getMonth() + 1;

				var yr=d.getFullYear();

				var cur=day+"-"+month+"-"+yr;

				

 				$("#id-date-picker-1").val(cur);

				$("#id-date-picker-2").val(cur);

				
				var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
				$('.easy-pie-chart.percentage').each(function(){
					$(this).easyPieChart({
						barColor: $(this).data('color'),
						trackColor: '#EEEEEE',
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: 18,
						animate: oldie ? false : 1000,
						size:150
					}).css('color', $(this).data('color'));
				});
	
				$('[data-rel=popover]').popover({html:true,
				content: function() {
				  //return $('#popover_content_wrapper').html();
				  return "test";
				}
				});
				$('[id^=percentage]').click(function(e) {//alert("fgh");
					var id=$(this).attr("data-id");
                    $(".rs").hide();
					$("#result_bar"+id).show();
					$("#bkbt").show();
                });
				$("#bkbt").click(function(e){
					$("[id^=result_bar]").hide();
					$(".rs").show();					
					$(this).hide();
				});


//	$('#demo').before( oTableTools.dom.container );



} );



</script>





</body></html>