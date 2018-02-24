<?php
//session_start();
//print_r($_POST);
if(isset($_POST['submit']) && $_POST['submit']=='submit'){
	$ip=$_POST['ip'];
	//$id=$_POST['id'];
	
	//$amt=$_POST['tot_amt'];
	//$_SESSION['total_payment_amt']=$amt;
	
	$method=$_POST['pay_method'];
	$_SESSION['pay_method_selected']=$method;	
	if($method=='amount'){
		$bank_option=$_POST['bank_option'];	
		$_SESSION['bank_option_selected']=$bank_option;
		//print_r($_SESSION);
		if($_SESSION['bank_option_selected']=='icici'){	
		 	redirect("http://ossgpstracking.com/merchant/ReqRSsl.php?ip=$ip");
		}
		else if($_SESSION['bank_option_selected']=='hdfc'){		 	
			redirect("http://ossgpstracking.com/gpsfront/hdfc/rREQuest.php?ip=$ip");
		}
	}
	else if($method=='netbanking'){
		$net_bank_option=$_POST['net_bank_option'];	
		$_SESSION['net_bank_option_selected']=$net_bank_option;
		//print_r($_SESSION);
		if($_SESSION['net_bank_option_selected']=='icici_net'){	
		 	redirect("http://ossgpstracking.com/merchant_net/payment/rReq.php?ip=$ip");
		}
		else if($_SESSION['net_bank_option_selected']=='hdfc_net'){	
		 	redirect("http://ossgpstracking.com/merchant_direcpay/rqTrans.php?ip=$ip");
		}
				
		 
	}
	else if($method=='emi'){
		$emi_bank_option=$_POST['emi_bank_option'];
		$_SESSION['emi_bank_option_selected']=$emi_bank_option;
		if($emi_bank_option=='emi_icici'){		
			$emi_option=$_POST['emi_option'];
			$_SESSION['emi_option_selected']=$emi_option;
			redirect("http://ossgpstracking.com/merchant_emi/rReqSSL.php?ip=$ip");
			
		}else if($emi_bank_option=='emi_hdfc')
		{
			$emi_option=$_POST['hdfc_emi_option'];
			$_SESSION['emi_option_selected']=$emi_option;
			redirect("http://ossgpstracking.com/gpsfront/hdfc_emi/rREQuest.php?ip=$ip");
			
		}
	}
	
//print_r($_SESSION);
	//
	
}
function redirect($url) {

	if(headers_sent()){

	?>

		<html><head>

			<script language="javascript" type="text/javascript">

				window.self.location='<?php print($url);?>';

			</script>

		</head></html>

	<?php

		exit;

	} else {

		header("Location: ".$url);

		exit;

	}

}


?>