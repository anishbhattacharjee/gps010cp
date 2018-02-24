<?php

  function getEmi_hdfc($p,$n,$type,$bank){
		$tenure=$n;//N
		$principal=round($p);//P
		if($bank=='icici'){
			$int_rate=13;
		}else{
			
			if($tenure==3 || $tenure==6){
				$int_rate=12;
			}else if($tenure==9 || $tenure==12){
				$int_rate=13;
			}
		}
		$int_rate_monthly=($int_rate/12);
		$int_rate_monthly=$int_rate_monthly/100;//R
		$plus_r=1+$int_rate_monthly;
		$temp=pow($plus_r,$tenure);
		$c=1/$temp;
		$b=1-$c;
		$rr=$int_rate_monthly/$b;
		$emi=$principal*$rr;
		$emi=round($emi);
		
		//$rate_anual=$int_rate/100;
		//$int=$principal*$rate_anual;
		$int=($emi*$n)-$principal;
		if($type=='emi'){
			return $emi;
		}else{
			return round($int);
		}
}

/*function getInt_hdfc($p,$n){
	$tenure=$n;//N
	$principal=round($p);//P
	if($tenure==3 || $tenure==6){
		$int_rate=12;
	}else if($tenure==9 || $tenure==12){
		$int_rate=13;
	}
	
	$rate_anual=$int_rate/100;
	$int=$principal*$rate_anual;
	return $int;
}
*/
$rinv=$_SESSION['rinv_track_id'];
$s=mysql_query("SELECT * FROM renew_invoice WHERE id=$rinv");
$qr=mysql_fetch_array($s);
$costt=$qr['final_total'];
$p=round($costt);
//echo $costt;
?>


			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="index.php?page=profile&id=<?php echo $id; ?>">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>
                        <li>

							<a href="index.php?page=subscription&id=<?php echo $id; ?>">Subscription</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>

						<li class="active">Renewal Payment</li>

					</ul><!--.breadcrumb-->



					
				</div>
   <link href="assets/css/main.css" rel="stylesheet">
<style>
.nav-tabs > li, .nav-pills > li {
	float:none;
	*width:10%;
}
.nav-tabs-style-2 > li > a{
		margin-right: -1px;
		border-width: 1px 1px 1px 1px;
}
.nav-tabs-style-2 > .active > a, .nav-tabs-style-2 > .active > a:hover, .nav-tabs-style-2 > .active > a:focus {
	border-bottom:1px solid #E0E0E0;
	border-right:none;
	border-width: 1px 0 1px 3px;
	border-color: #E0E0E0 #E0E0E0 #E0E0E0 #00BECC !important;
	box-shadow:none !important;
	border-top:1px solid #E0E0E0 !important;
}
.card-logo li {
background: url('images/card.png') 0 0 no-repeat;
height: 26px;
width: 40px;
vertical-align: middle;
display: inline-block;
zoom: 1;
}
.card-logo li.visa {
background-position: -42px 0;
}
.card-logo li.master {
background-position: -82px 0;
}
input[type=radio] {
opacity: 1;
width:15px !important;
margin:0px;
}
</style>


				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Choose your mode of payment                  

						</h1>

                        

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

							<!--PAGE CONTENT BEGINS--><!--/row-->

							<div class="row-fluid">


 <form action="index.php?page=payment_submit&id=<?php echo $id; ?>" method="post" class="form-horizontal form-checkout" id="pay">
 				
               	

						  <!--  ==========  -->
						<!--  = Tab style 2 =  -->
						<!--  ==========  -->
                        <div class="span3">
                       
                	    <ul id="myTab2" class="nav nav-tabs nav-tabs-style-2">
                	         <li id="amount" class="active">
                	            <a href="#tab2-2" data-toggle="tab" >Credit Card / Debit Card</a>
                	        </li>
                            <li id="netbanking">
                	            <a href="#tab2-1" data-toggle="tab" >Net Banking</a>
                	        </li >
                	        <li id="emi">
                	            <a href="#tab2-3" data-toggle="tab">EMI</a>
                	        </li>
                	       
                            
                	    </ul>
                      
                        </div>
                	    <div class="tab-content" style="width: 64%;">
                         <div class="fade in tab-pane active" id="tab2-2">
                             <span>Pay using Credit/Debit Cards </span>
                             <ul class="card-logo" style="display:inline;">
                                <li class="visa"></li>
                                <li class="master"></li>
                                <li class="amex"></li>
                            </ul>
                            
                             <hr/>
                             <div style="margin-bottom:30px;">We accept all the Master/Visa cards and Debit cards for the payment issued by any bank.<p>
Please select one of the payment gateways for the card payment.</p></div>
                	            <div id="bank_options" >
                                
                                	 <div class="control-group">
                                    <label class="control-label" for="bank_option_1">
													
													<span class="lbl"> ICICI BANK</span>
												</label>                                    

                                        <div class="controls">
											<input name="bank_option" type="radio" value="icici"  class="span4" checked>                                        

                                        </div>

                                    </div>
                                    
                                     <div class="control-group">
                                    <label class="control-label" for="bank_option_2">
													
													<span class="lbl"> HDFC BANK</span>
												</label>                                    

                                        <div class="controls">
											<input name="bank_option" type="radio" value="hdfc"  class="span4"  >

                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div style="color:#ccc; margin-top:50px;">
                                By placing the order, you have read and agreed to ossgpstracking.com <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                                </div>
                	        </div>
                	        <div class="fade tab-pane " id="tab2-1">
                	            <p>Pay using Net Banking</p>
                                 <hr/>
                	            <!-------->
                                <div style="margin-bottom:30px;">Please select one of the payment gateways for netbanking.</div>
                                 <div class="control-group">
                                    <label class="control-label" for="net_bank_option_1">
													
													<span class="lbl"> ICICI BANK</span>
												</label>                                    

                                        <div class="controls">
											<input name="net_bank_option" type="radio" value="icici_net"  class="span4" checked >                                        

                                        </div>

                                    </div>
                                    
                                     <div class="control-group">
                                    <label class="control-label" for="net_bank_option_2">
													
													<span class="lbl"> HDFC BANK</span>
												</label>                                    

                                        <div class="controls">
											<input name="net_bank_option" type="radio" value="hdfc_net"  class="span4"  >                                        

                                        </div>

                                    </div>
                                <!-------->
                                <div style="color:#ccc; margin-top:50px;">
                                By placing the order, you have read and agreed to ossgpstracking.com <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                                </div>
                	        </div><!---tab 2 end----->
                	       
                	        <div class="fade tab-pane" id="tab2-3">
                	            <span>
                	                Pay using EMI on Credit Card: 
                	             </span>
                             <ul class="card-logo" style="display:inline;">
                                <li class="visa"></li>
                                <li class="master"></li>
                                <li class="amex"></li>
                            </ul>
                                <hr/>
                                <div style="border:1px solid #E6E6E6;padding: 10px;">
                                	<p style="color:red;">Please Note:</p>
                                    <p style=" background:#E6E6E6;padding: 5px;">In case of any kind of Refund in an EMI transaction, interest already billed in a particular transaction will not be refundable under any circumstances. </p>
                                </div>
                                <div style="margin: 15px 0 15px 0;">Choose an EMI scheme and pay in easy installments.</div>
                                
                                <div>
                                	<b>Select your bank</b>
                                    <select  class="span2" name="emi_bank_option" style="margin-left:20px;" id="emi_banks">
										<option value="emi_icici">ICICI BANK</option>
                                        <option value="emi_hdfc">HDFC BANK</option>
                           			 </select>
                                </div>
                                 <div style="margin: 15px 0 15px 0;">
                                	<p><b>Select a Plan</b></p>
                                    <table id="tab_icici" class="table table-bordered table-hover">
                                       <thead>
                                           <tr>
                                            <th></th>
                                            <th>Tenure (Months)</th>
                                            <th>Bank Interest Rate</th>
                                            <th>Monthly Installments</th>
                                            <th>*Interest paid to Bank</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                            
                                           <tr>
                                               <td><input name="emi_option" type="radio" value="3"  class="span1" checked ></td>
                                               <td>3</td>
                                               <td>13%</td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,3,'emi','icici'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,3,'int','icici'); ?></td>
                                           </tr>
                                            
                                           <tr>
                                               <td><input name="emi_option" type="radio" value="6"  class="span1"></td>
                                               <td>6</td>
                                               <td>13%</td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,6,'emi','icici'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,6,'int','icici'); ?></td>
                                           </tr>
                                            
                                           <tr>
                                               <td><input name="emi_option" type="radio" value="9"  class="span1"></td>
                                               <td>9</td>
                                               <td>13%</td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,9,'emi','icici'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,9,'int','icici'); ?></td>
                                           </tr>
                                            
                                           <tr>
                                               <td><input name="emi_option" type="radio" value="12"  class="span1"></td>
                                               <td>12</td>
                                               <td>13%</td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,12,'emi','icici'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,12,'int','icici'); ?></td>
                                           </tr>
                                            
                                       </tbody>
                                   </table>

                                   <table class="table table-bordered table-hover" id="tab_hdfc" style="display:none">
                                       <thead>
                                           <tr>
                                            <th></th>
                                            <th>Tenure (Months)</th>
                                            <th>Bank Interest Rate</th>
                                            <th>Monthly Installments</th>
                                            <th>*Interest paid to Bank</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                            
                                           <tr>
                                               <td><input name="hdfc_emi_option" type="radio" value="3"  class="span1" checked ></td>
                                               <td>3</td>
                                               <td>12%</td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,3,'emi','hdfc'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,3,'int','hdfc'); ?></td>
                                           </tr>
                                            
                                           <tr>
                                               <td><input name="hdfc_emi_option" type="radio" value="6"  class="span1"></td>
                                               <td>6</td>
                                               <td>12%</td>
                                                <td>Rs. <?php echo getEmi_hdfc($p,6,'emi','hdfc'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,6,'int','hdfc'); ?></td>
                                           </tr>
                                            
                                           <tr>
                                               <td><input name="hdfc_emi_option" type="radio" value="9"  class="span1"></td>
                                               <td>9</td>
                                               <td>13%</td>
                                                <td>Rs. <?php echo getEmi_hdfc($p,9,'emi','hdfc'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,9,'int','hdfc'); ?></td>
                                           </tr>
                                            
                                           <tr>
                                               <td><input name="hdfc_emi_option" type="radio" value="12"  class="span1"></td>
                                               <td>12</td>
                                               <td>13%</td>
                                                <td>Rs. <?php echo getEmi_hdfc($p,12,'emi','hdfc'); ?></td>
                                               <td>Rs. <?php echo getEmi_hdfc($p,12,'int','hdfc'); ?></td>
                                           </tr>
                                            
                                       </tbody>
                                   </table>
                                    <p>
                                    <span>*Taxes will be applicable on the interest paid to bank</span>
                                    <span style="float:right"></span>
                                    </p>
                                </div>
                                
                                <div style="color:#C2C2C2; margin-top:50px;">
                                By placing the order, you have read and agreed to ossgpstracking.com <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                                </div>
                                
                	        </div>
                	    </div>
                	
<!-------/tabs-------->	
                            
                           

						       
                                <input type="hidden" name="pay_method" id="pay_method" value="amount">
                                <input type="hidden" name="ip" id="ip" value="<?php echo $_SESSION['sesid']; ?>">
                               
                               

<hr/>
						    <p class="right-align">

 <button type="submit"  name="submit" value="submit" class="btn btn-primary higher bold" > Pay </button>
						    </p>

							    
</form>

							</div>





						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			</div><!--/.main-content-->

		</div><!--/.main-container-->



<?php include "include/footer.php"; ?>

		<!--inline scripts related to this page-->

    
<script>
/*function getTab(){
	  var activeTab = 'amount';
	//$('a[data-toggle="tab"]').on('shown', function (e) {
	  activeTab=$('.nav-tabs .active').id();
	  $("#pay_method").val(activeTab);alert(activeTab);
	//})
}
*/
$(function(e){
	
	//var selectedTab = $("#myTab2").tabs().data("selected.tabs");
	var activeTab = 'amount';
	$('a[data-toggle="tab"]').on('shown', function (e) {
	  activeTab=$('.nav-tabs .active').attr('id');
	  $("#pay_method").val(activeTab);//alert(activeTab);
	})
/**/	
	$('#emi_banks').change(function(){
				var emi_bank=$(this).val();
				if(emi_bank=='emi_icici'){
					$("#tab_icici").show();
					$("#tab_hdfc").hide();
					
				}else if(emi_bank=='emi_hdfc'){
					$("#tab_icici").hide();
					$("#tab_hdfc").show();
				}
	});
/*	//$('#pay_methods input:radio:first').attr("checked",true);
	
	//$("#emi_options").hide();
	
	$('.pay_methods input:radio').change(function(){//alert($(this).val());
		if($(this).val()=='emi'){
			$("#emi_options").show();
			$("#emi_icon").html('<i class="icon-chevron-down"></i>');
			$("#bank_options").hide();
			$("#bank_icon").html('<i class="icon-chevron-right"></i>');
			$("#net_bank_options").hide();
			$("#net_bank_icon").html('<i class="icon-chevron-right"></i>');
			//$("#bank_options input:radio[name=bank_option]").attr('checked', false);
			$("#emi_options input:radio[name=emi_option]:nth(0)").prop('checked', true);
			
		}
		else if($(this).val()=='amount'){
			$("#bank_options").show();
			$("#bank_icon").html('<i class="icon-chevron-down"></i>');
			$("#emi_options").hide();
			$("#emi_icon").html('<i class="icon-chevron-right"></i>');
			$("#bank_options input:radio:first").attr('checked', true);
			$("#net_bank_options").hide();
			$("#net_bank_icon").html('<i class="icon-chevron-right"></i>');
			//$("#emi_options input:radio[name=emi_option]").attr('checked', false);
			$("#bank_options input:radio[name=bank_option]:nth(0)").prop('checked', true);			
			
		}else if($(this).val()=='netbanking'){
			//$('#emi_options input:radio').removeAttr('checked');
			$("#net_bank_options").show();
			$("#net_bank_icon").html('<i class="icon-chevron-down"></i>');			
			$("#emi_options").hide();
			$("#emi_icon").html('<i class="icon-chevron-right"></i>');
			$("#bank_options").hide();
			$("#bank_icon").html('<i class="icon-chevron-right"></i>');
			$("#net_bank_options input:radio[name=net_bank_option]:nth(0)").prop('checked', true);
			//$("#emi_options input:radio").attr('checked', false);
			//$("#bank_options input:radio").attr('checked', false);
		}
	});
*/
});
</script>



	</body>

</html>

