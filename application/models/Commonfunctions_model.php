<?php 
class Commonfunctions_model extends CI_Model {

public function getUserInfo(){
	$page = $this->uri->segment(2);
	$id = $this->uri->segment(3);
	
	$sublogin_created_by=0;
	$sql="select * from customers where customer_id=".$id;
	
	$rs=$this->db->query($sql);
	if($rs->num_rows() > 0){
		$customer=$rs->result_array();
		$customer = $data['customer'] = $customer[0];
		$data['customer_city']=$customer['city'];
		$data['customer_state']=$customer['state'];
		$data['customer_first_name']=$customer['customer_first_name'];
		$customer_concox=$customer['concox'];
		if($customer['sub_login_createdby']){
			$data['sublogin_created_by']=$customer['sub_login_createdby'];
		}

		$customer_latlng='12.973168333333,77.603765';
		$sql_latlng="select latlng from map_locations where city='".$customer['city']."'";
		$rslatlng=$this->db->query($sql_latlng);
		
		if($rslatlng->num_rows() > 0){
			$customer_l=$rslatlng->result_array();
			$customer_l = $customer_l[0];
			$data['customer_latlng']=$customer_l['latlng'];
		}
	}

	$sq_sett="select * from settings";

	$rs_sett=$this->db->query($sq_sett);
	if($rs_sett->num_rows() >0){
		$sett=$rs_sett->result_array();
		$sett = $sett[0];
		$data['s_tax_per']=$sett['service_tax_percentage'];
		$data['vat_per']=$sett['vat_percentage'];
	}
	
	return $data;
}
	
public function get_user_folder($id,$page,$type=''){
	if($type!=''){
		$folder="include";
	}else{
		$folder='pages';
	}
	$sql="select folder from customer_pages where customer_id=$id and page='$page'";
	$rs=$this->db->query($sql);
	if($rs->num_rows() > 0){
		$folders=$rs->result_array();
		$folders = $folders[0];
		$folder=$folders['folder'];
	}
	if($id==863 && $page=='settings')	{//vani school disable settings
		$folder='404';
	}
	return $folder;
	
}
function time_elapsed_string($ptime)

{

    $etime = time() - $ptime;

    if ($etime < 1){

        return '0 seconds';

    }



    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',

                30 * 24 * 60 * 60       =>  'month',

                24 * 60 * 60            =>  'day',

                60 * 60                 =>  'hour',

                60                      =>  'minute',

                1                       =>  'second'

                );



    foreach ($a as $secs => $str){

        $d = $etime / $secs;

        if ($d >= 1){

            $r = round($d);

            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';

        }

    }

}


function getDevStat($devid,$last_signal,$dbcat,$engine,$speed,$cat,$req){	
	$cat=strtolower($cat);
	/*if($devid==24){//ogct-006
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
		}else{
			$stat="moving";
			$img='assets/images/marker-images/'.$cat.'/green.png';
		}
	}else*/ if($dbcat==5 || $dbcat==19 || $dbcat==10){//personal or gpsid or asset
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
		}else{
			$stat="active";
			$img='assets/images/marker-images/'.$cat.'/green.png';
		}
		
	}else{
	
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
		}else if($engine=='acc on' && $speed>0){//active green
			$stat="moving";
			$img='assets/images/marker-images/'.$cat.'/green.png';
		}else if($engine=='acc on' && $speed==0){//idle yellow			
			$stat="idle";
			$img='assets/images/marker-images/'.$cat.'/orange.png';
		}else if($engine=='acc off'){//engine off  grey
			$stat="parked";
			$img='assets/images/marker-images/'.$cat.'/yellow.png';
		}else if($engine==''){//engine off  grey
			if($speed==0){
				$stat="parked";
				$img='assets/images/marker-images/'.$cat.'/yellow.png';
			}else{
				$stat="moving";
				$img='assets/images/marker-images/'.$cat.'/green.png';
			}
		}else{
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
		}
	}
	
	if($req=="stat"){
		return $stat;
	}else{
		return $img;
	}
	
	
}
function getDevStatCOla($last_signal,$engine,$cat,$req,$speed){	
	$cat=strtolower($cat);
	
	
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
		}else if($engine=='acc on'  && $speed > 0){//active green
			$stat="moving";
			$img='assets/images/marker-images/'.$cat.'/green.png';
		}else if($engine=='acc on'  && $speed == 0){//active green
			$stat="idle";
			$img='assets/images/marker-images/'.$cat.'/orange.png';
		}else if($engine=='acc off'){//engine off  grey
			$stat="parked";
			$img='assets/images/marker-images/'.$cat.'/yellow.png';
		}else if($engine==''){//engine off  grey
			if($speed > 0){
				$stat="moving";
				$img='assets/images/marker-images/'.$cat.'/green.png';
			}else{
				$stat="parked";
				$img='assets/images/marker-images/'.$cat.'/yellow.png';
			}
			
		}else{
			$stat="parked";
			$img='assets/images/marker-images/'.$cat.'/red.png';
		}
	
	
	if($req=="stat"){
		return $stat;
	}else{
		return $img;
	}
	
	
}

function getDevStatNational($last_signal,$engine,$speed){
	
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="Inactive";
			$label="important";
			
		}else if($engine=='acc on' && $speed>0){//active green
			$stat="Moving";
			$label="success";
			
		}else if($engine=='acc on' && $speed==0){//idle yellow			
			$stat="Idle";
			$label="warning";
			
		}else if($engine=='acc off'){//engine off  grey
			$stat="Parked";
			$label="info";
			
		}else if($engine==''){
			if($speed==0){
				$stat="Parked";
				$label="info";
			}else{
				$stat="Moving";
				$label="success";
			}
			
			
		}
	
	
		return array($stat,$label);
	
	
	
}

function get_nots_icon($action){

	

	switch($action){

		

		case 'order'	:	$icon="icon-ok btn-success";

							break;

		case 'payment'	:	$icon="icon-credit-card btn-info";

							break;

		case 'invoice'	:	$icon="icon-list btn-pink";

							break;

		case 'document'	:	$icon="icon-list-alt btn-primary";

							break;

		case 'engineer'	:	$icon="icon-user btn-purple";

							break;

		case 'installation'	:	$icon="icon-certificate btn-yellow";

							break;
		case 'r_exp'	:	$icon="icon-bell-alt btn-yellow";

							break;
							
		case 'r_expd'	:	$icon="icon-bell btn-danger";

							break;
		case 'renewed'	:	$icon="icon-credit-card btn-success";

							break;
		case 'renew_fail'	:	$icon="icon-credit-card btn-danger";

							break;																			
							

					

	}

	return $icon;

}

					
function has_no_permission($type,$id2,$id){
	switch($type){
		
		case 'live' :
$s_dev="SELECT
installation.model_id
FROM
installation
WHERE installation.model_id=".$id2." and customer_id=$id AND installation_status='completed'";
						$r_dev=$this->db->query($s_dev);
						$row_dev=$this->result_array($r_dev);	
						$row_dev =  $row_dev[0];
						if($row_dev['model_id'] && $row_dev['model_id']!='')
						{
							$result= false;
						}
						else{
							$result= true;
						}
						break;
						
						
		case 'invoice':

$sql="SELECT
o.order_id
FROM
customer_orders o
INNER JOIN payment_master r on o.order_id=r.order_id
WHERE o.customer_id=$id and r.response='success' and o.order_id=".$id2;
						$rs=$this->db->query($sql);
						$row=$rs->result_array();	
						$row = $row[0];
						if($row['order_id'] && $row['order_id']!='')
						{
							$result= false;
						}
						else{
							$result= true;
						}
						break;



		case 'mail':

$sql="SELECT notification_id FROM notifications WHERE customer_id=$id and notification_id=".$id2;
						$rs=$this->db->query($sql);
						$row=$rs->result_array();	
						$row = $row[0];
						if($row['notification_id'] && $row['notification_id']!='')
						{
							$result= false;
						}
						else{
							$result= true;
						}
						break;
						
		case 'tkt':
		
		$sql="SELECT ticket_id FROM ticket_details WHERE customer_id=$id and ticket_id=$id2 limit 1";
						$rs=$this->db->query($sql);
						$row=$rs->result_array();
						$row = $row[0];						
						if($row['ticket_id'] && $row['ticket_id']!='')
						{
							$result= false;
						}
						else{
							$result= true;
						}
						break;	
						
		case 'trip':
		
		$sql="SELECT id FROM trip_schedule WHERE customer_id=$id and id=$id2 and trip_status!= 'Deleted' limit 1";
						$rs=$this->db->query($sql);
						$row=$rs->result_array();	
						$row = $row[0];
						if($row['id'] && $row['id']!='')
						{
							$result= false;
						}
						else{
							$result= true;
						}
						break;		
	}
return $result;
						

}


function getsetting($set,$id){
$sql="select ".$set." from customer_settings where customer_id=".$id;
$rs=$this->db->query($sql);
$settng=$rs->result_array();
$settng = $settng[0];
return $settng[$set];
}

function getStatClass($status){
		switch($status){
			case 'Active' : $label="success";
							break;	
			case 'Inactive' : $label="important";
							break;	
			case 'Started' : $label="info";
							break;	
			case 'Start Delay' : $label="warning arrowed";
							break;	
			case 'Ended' : $label="grey";
							break;	
			case 'End Delay' : $label="warning arrowed-right";	
							break;	
		}
		return $label;
	}
	
function get_user_rpt_lnk_folder($id){
	$folder='include';
	$sql="select folder from customer_pages where customer_id=$id and page='reportleft'";
	$rs=$this->db->query($sql);
	if($rs->num_rows() > 0){
		$folders=$rs->result_array();
		$folders = $folders[0];
		$folder=$folders['folder'];
	}	
	return $folder;
}
/*	
function get_overview_folder($id){
	$folder='include';
	$sql="select folder from customer_pages where customer_id=$id and page='overview_left'";
	$rs=$this->db->query($sql);
	if($rs->num_rows() > 0){
		$folders=$rs->result_array();
		$folder=$folders['folder'];
	}	
	return $folder;
}
*/

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}

}