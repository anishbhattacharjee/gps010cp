<?php
class Profile_model extends CI_Model {

	public function getDeviceInfo(){
		$page = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		
		$sql="SELECT

		gps_model_details.model_id,

		gps_categories.category_type,

		gps_model_details.device_id,

		installation.device_name,
		installation.imie_no,

		gps_model_details.slnumber,

		gps_model_details.imie_number,

		gps_model_details.recv_dt,

		gps_model_details.conditions,

		gps_model_details.remarks,

		gps_model_details.cost,

		installation.image,

		gps_model_details.`status`,

		gps_model_details.created_date_time

		FROM

		installation

		INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id
		INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
		WHERE customer_id=".$id." and installation_status='completed'";
		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			$devices['data']=$rs->result_array();
			$devices[0] = true;
		}else{
			$devices[0]= false;
		}
		return $devices;
	}
}