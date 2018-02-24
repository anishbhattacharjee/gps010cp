<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8" />

		<title>GPS</title>



		<meta name="description" content="3 styles with inline editable feature" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />



		<!--basic styles-->



		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />

		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />



		<!--[if IE 7]>

		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />

		<![endif]-->



		<!--page specific plugin styles-->



		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />

		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />

		<link rel="stylesheet" href="assets/css/select2.css" />

        <?php if(isset($page) && $page=='profile'){ ?>

		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />

        <?php } ?>

        <?php if(isset($page) && $page=='notifications'){ ?>

		<link rel="stylesheet" href="assets/css/fullcalendar.css" />

		<?php } ?>



		<!--fonts-->



		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />



		<!--ace styles-->



		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />

		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />



		<!--[if lte IE 8]>

		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />

		<![endif]-->



		<!--inline styles related to this page-->

        <style>

		small img{

width: 60%;

margin-top: -12px;

padding: 0px;

margin-bottom: -12px;

}

		</style>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>



	<body>

		<div class="navbar">

			<div class="navbar-inner">

				<div class="container-fluid">

					<a href="#" class="brand">

						<small>

							<img src="assets/images/logo.png"/>

						</small>

					</a><!--/.brand-->



				</div><!--/.container-fluid-->

			</div><!--/.navbar-inner-->

		</div>


<?php
function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

	$id=$_GET['id'];
	$inv=$_GET['inv'];
?>
<?php

$qq=mysql_query("SELECT o.customer_id,
o.order_id,o.paid_on
FROM
renew_invoice o
inner join payment_master r on o.id=r.rinv_id where o.id='$inv' and o.customer_id='$id' group by o.order_id
order by o.order_id desc");
if(mysql_num_rows($qq)>0)
{
	?>


	<?php
					
					
					$sq1="SELECT

o.order_id,

o.customer_id,

c.customer_first_name,

c.customer_middle_name,

c.customer_last_name,

c.customer_phone_no,

c.customer_emailid,

c.address,

c.comp_name,

c.comp_addr,

c.comp_teleph,

c.comp_email,c.state,

c.website,

o.final_total,

o.paid_on

FROM

renew_invoice o

INNER JOIN customers c ON o.customer_id = c.customer_id

WHERE o.customer_id=$id AND o.id=$inv";

$rs=mysql_query($sq1);

$order=mysql_fetch_assoc($rs);
					
$sq_sett="select * from settings";

$rs_sett=mysql_query($sq_sett);

$sett=mysql_fetch_assoc($rs_sett);

$s_tax_per=$sett['service_tax_percentage'];

$vat_per=$sett['vat_percentage'];
$state=$order['state'];
					?>
<img   align="absmiddle" src="../gps/ck/mainlogo.png" alt="" />
<h1  style=" 
    margin-top: 4px;
    margin-bottom: -24px;margin-left:240px;font-size:30px;">TAX INVOICE</h1>
<h1  style="
    margin-top: 15px;
    margin-bottom: -24px;margin-left:39px;"  >OSS TECHNOLOGIES PRIVATE LIMITED</h1>
<h3 style="margin-bottom: -17px;margin-left:179px;
">(OSS GPS TRACKING SOLUTIONS)</h3>
<h3  style="margin-left: 92px;"># 204 Raheja Chamber, 12 Museum Road, Bangalore - 560 001</h3>

<table  border="2" style="width: 823px;font-size: 14px;">
	<tr><td style="padding: 10px;max-width: 125px;" rowspan="" align="top">INVOICE TO</td>
	<td>Invoice Number</td>
	<td>#RINV<?php echo str_pad($inv, 4, '0', STR_PAD_LEFT)."/2014-15"; ?></td>
	</tr>
	<tr>
<?php
if($order['comp_email']!='')
{
?>

<td rowspan="6" align="top" style="max-width: 125px;font-size: 19px;"><?php echo $order['customer_first_name'];?><br /><?php echo $order['comp_addr']; ?></td>
	<?php }
	else
	{ ?>
	<td rowspan="6" align="top" style="max-width: 125px;font-size: 19px;"><?php echo $order['customer_first_name'];?><br />	<?php echo $order['address']; ?></td>

<?php } ?>
	<td>Invoice Date</td>
	<td style="padding: 10px;"><?php echo date("d-m-Y",strtotime($order['paid_on'])); ?></td>
	</tr>
	
	
	
	<tr>
	<td>Destination </td>
	<td></td>
	</tr>
	
	<tr>
	<td>Purchase Order No </td>
	<td style="padding: 10px;"><?php echo "OD_".$order['order_id']; ?></td>
	</tr>
	
	<tr>
	<td>Delivery Date</td>
	<td style="padding: 10px;"></td>
	</tr>
	
	<tr>
	<td>Payment Mode</td>
	<td style="padding: 10px;"  width="195px"></td>
	</tr>
	
	
</table>

</br>

<table  border="2" style="width: 820px;">
	<tr><th style="padding: 10px">Description of Goods</th>
		<th style="padding: 10px">Quantity</th>
	<th style="padding: 10px">Rate</th>
	<th style="padding: 10px">Per</th>
	<th style="padding: 10px">Amount (INR)</th>
	</tr>
    <?php

															$i=0;

															$subtot=0;

															$subs_cost=0;

															$inst_cost=0;

															$dev_cost_tot=0;

															

															$sql1="SELECT

re.*,
gps_categories.category_type,
gps_devices.device_type
FROM
renew_invoice re
INNER JOIN gps_categories ON re.category_id = gps_categories.category_id
INNER JOIN gps_devices ON gps_devices.device_id = re.device_id
WHERE re.customer_id=$id AND re.id=$inv";
	$rs1=mysql_query($sql1);

															$ord_det=mysql_fetch_assoc($rs1);

																$ctid=$ord_det['category_id'];
																$did=$ord_det['device_id'];
																$sbmnth=$ord_det['sub_month'];
																$sbcst=$ord_det['sub_cost'];
																$ndev=1;
																$simcharge=$ord_det['simcharge_permonth'];
$tot=($ord_det['sub_cost'])+($ord_det['simcharge_permonth']*$ord_det['sub_month']);
$s_tax_per=$ord_det['service_tax'];

																


$subtot=$tot;

 ?>

	
	<tr>
		<td ><?php echo $ord_det['category_type']; ?> - <?php echo $ord_det['device_type']; ?>
<br/>
		<?php		

		$iq=mysql_query("select imie_no from r_installation where r_id=".$ord_det['r_id']);
		$riq=mysql_fetch_array($iq);
		
		?>
		<?php echo $riq['imie_no'];?></td>
		<td>1<?php //echo $ord_det['noofdevice']; ?></td>
		<td>0<?php //echo $ord_det['device_cost']; ?></td>
		<td>Nos</td>
	<td>0</td>
	</tr>
	
		
<tr>
<td>Installation Charges</td>
<td>1</td>
<td>0</td>
<td>Nos</td>
<td>0</td>
	
</tr>
<tr>
<td>Subscription Charges(for <?php echo $sbmnth;?> Months)</td>
<td>1</td>
<td><?php echo $sbcst; ?></td>
<td>Nos</td>
<td><?php echo $sbcst*$ndev; ?></td>
	
</tr>
<tr>
<td>Sim Charges(for <?php echo $sbmnth;?> Months)</td>
<td>1<?php //echo $ndev; ?></td>

<td><?php echo $simcharge*$sbmnth; ?></td>
<td>Nos</td>
<td><?php echo $simcharge*$sbmnth; ?></td>
	
</tr>
<tr>
<td></td>
<td>SubTotal of ServiceTax</td>

<td></td>
<td></td>
<td><?php echo $s_tax=($tot*$s_tax_per)/100;//echo (($inst*$ndev)+($sbcst*$ndev)+($simcharge));?></td>
</tr>
	
	<tr>
		<td>Service Tax @ <?php echo $s_tax_per; ?>%</td>
		<td></td>
		
		<td></td>
		
		<td><?php echo $s_tax_per; ?>%</td>
		<td><?php echo $s_tax; ?></td>
	</tr>
	<tr style="height: 26px;">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
			
	<tr>
		<td>Total</td>
		<td></td>
		<td></td>
		<td></td>
		
		<td><?php echo $total=$order['final_total'];?></td>
	</tr>

	<tr rowspan="2">
	<td>Amount in words:-</td>
		<td colspan="5">&nbsp;&nbsp;&nbsp;  <?php echo ucwords(convert_number_to_words($total)); ?></td>
		
</tr>
		
	
	
	
</table>


</br>

<table  border="2" style="width: 823px;">
	<tr>
		<td width="200px">Service Tax No</td>
		<td  width="250px">AAACO3054HST001</td>
	</tr><tr>
		<td>PAN No</td>
		<td >AAACO3054HST </td>
	</tr><tr>
		<td>VAT No</td>
		<td >29120320337</td>
	</tr><tr>
		<td>CST No</td>
		<td >4470643</td>
	</tr>
	
	
</table >

<p ><b>Payment :- Cheque/DD/Payorder in favour of "OSS Technologies Private Limited"</b></p>
<p ><b>Online Transfer:- State Bank Of India, A/c-10242758996, IFSC Code-SBIN0000814,B'lore.</b></p>
<p ><b>For OSS TECHNOLOGIES PRIVATE LIMITED</b></p>

<table >
	<tr ><td >Authorized Signatory</td>
	<td><img  style="margin-left: 475px;" src="../gps/ck/Logo.png"/></td></tr>
	
</table>
<?php }?>

<table style="width: 823px;text-align: justify;font-size:10px;"><tr><td>
<img src="../gps/ck/mainlogo.png"/>
<p><b>Terms and Conditions:</b></p>
<p>
1. ACTIVATING THE DEVICE:-You accept that the Device must be able to communicate with the appropriate GPS satellites, by line of sight, so the Device will generally not work indoors or where the line of sight is obscured. You also accept that the Device must be in the reception range of GSM network supplier. If the Device loses connection, the Service will continue to show the last known location of the Device. In order to activate the Device and use the Service, you must correctly enter in the IMEI and SIM numbers supplied with your Device, in order to set up an account with us. You must also keep the credit on that mobile account topped up. If you enter the wrong numbers, you may end up crediting someone else's account and it is unlikely that you will be able to get that money back. You will also not be able to use the Device with the Service and will not receive alerts or other messages.
</p>
<p>
2. DEVICE WARRANTY:-We warrant to you (provided that you are the original purchaser of the Device) that the Device will be free from significant defects in material and workmanship for a period of 3 years from the date of original purchase. Goods once sold will not be taken back or exchanged without proper prior approval. No warranty on burnt, physical damage, track cut items/tampered with or modified.
</p>
<p>
	3. USE OF INFORMATION:-We will collect personal information about you when you register with us, to enable us to set up an account with us in order to provide the Services to you. As part of the Service, we will send you SMS, e-mails and other messages and alerts in accordance with the way you have configured the Service and to inform you of changes or problems. It is important therefore that you keep your contact details up to date. By entering into these Terms, you agree that we may collect, store, use and disclose your data, and contact you, as set out above.
	
</p>

<p>
	4. NO UNLAWFUL OR PROHIBITED USE:-By accessing OSS GPS Tracking Solutions website, you warrant to OGTS that you will not use this Site, or any of the content obtained from this Site, for any purpose that is unlawful or prohibited by these Terms. If you violate any of these Terms, your permission to use the OGTS Site automatically terminates.
</p>
<p>
	5. GPS DEVICE RETURNS:-We do not offer refund if the device package seal is once broken. 
</p>
<p>
	6. CANCELLATION: - If the device is deactivated, there may be a charge to reactivate it if you later decide to use it again.
</p>
<p>
	
	7. NO TRANSFER OF THE SERVICES:-The Services are not transferrable by you, even if you are a commercial user. If you intend to transfer ownership of a vehicle or asset in which an OSS GPS Tracking Device is installed, you agree that you inform the intended transferee prior to the transfer of the fact your vehicle has your Device and advise the transferee to contact us with any questions.
</p>
<p>
	8. SUSPENSION AND TERMINATION OF THE SERVICES:-The Services may be suspended or terminated without prior notice to you for good cause without liability. This means, to give some examples, that the Services can be terminated or suspended if you breach any part of this agreement, do not pay amounts that are due under this Agreement, interfere with provision of the Services, or use the Services for any illegal or otherwise improper purpose. We are not responsible for third party services used along with our product/device.
</p>

<p>
	9. BREACH OF THIS AGREEMENT:-You agree to indemnify and hold us and our Parent Corporation, affiliates, subsidiaries, employees, agents, and service providers harmless from and against any and all claims, demands, actions, causes of action, suits, proceedings, losses, damages, costs and expenses, including reasonable attorneys' fees, arising from or relating to your use of the Services, breach of this Agreement, or any act, error, or omission on your part or that of anyone who uses the Services. This provision will continue to apply after the Termination or cancellation of this Agreement. All disputes subject to Bangalore Jurisdiction.
</p>
<p>
	10. LOST OR STOLEN VEHICLES:-If your vehicle or asset is lost or stolen, we can try to help you locate it, although we have no responsibility to do so. We do not guarantee that it can or will be found, and do not guarantee the condition of your vehicle or the items that were in it will be present should the vehicle be recovered. You may be asked to provide satisfactory identification and/or a police report. In any event, our obligation to assist you in providing commercially reasonable assistance to your efforts to locate your vehicle will end after 24 hours have elapsed from the time it was first reported to the authorities as missing or stolen. 
</p>
<p>
	11. TRADEMARK INFORMATION:-OSS GPS Tracking Solutions logos and service marks, and product and service names are its trademarks or registered trademarks in India. These terms of use do not grant user any license in OSS GPS Tracking Solutions trademarks or any OGTS owned intellectual property. All other names and designs may be trademarks of their respective owners.
</p>
<p>
	12. Every Cheque return will attract a penalty of Rs.250/-.Payment should be made as per the agreed terms. Otherwise interest 36% per annum will be charged over dues.
</p>
<p>
	13. For more details on Products and terms & Conditions please visit www.ossgpstracking.com
</p>

<img align="right" src="../gps/ck/Logo.png"/></td></tr>
</table>


<?php include "include/footer.php";?>

	</body>

</html>

