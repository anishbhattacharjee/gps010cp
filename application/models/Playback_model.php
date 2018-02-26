<?php
class Playback_model extends CI_Model {

	public function getPlayBackInfo(){
		$page = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		
		
		$sql="SELECT
		installation.model_id,
		installation.device_name,
		installation.imie_no
		FROM
		installation
		WHERE installation_status='completed' AND customer_id=$id  and category_id!=4";
		
		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			$trips['data']=$rs->result_array();
			$trips[0] = true;
		}else{
			$trips[0]= false;
		}
		return $trips;
	}

	public function getMakeDetails($imei){
		$make='na';
		$sql="select make from device_make where imei='$imei'";
		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){		
			$data=$rs->result_array();
			$make=$data['make'];
		}
		return $make;
	}
	
}