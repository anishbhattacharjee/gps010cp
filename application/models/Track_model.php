<?php
class Track_model extends CI_Model {	
	public function GetTrackInfo(){
		$page = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		$sql="SELECT
				installation.instatllation_id,
				installation.category_id,
				installation.device_id,
				installation.model_id,
				installation.device_name,
				installation.imie_no,
				gps_categories.category_type,
				gps_devices.device_type,
				installation.image
				FROM
				installation
				INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
				INNER JOIN gps_devices ON gps_devices.device_id = installation.device_id
				WHERE customer_id=$id AND installation_status='completed' and gps_categories.category_id!=4  order by installation.device_name";
		$rs=$this->db->query($sql);
		if($rs->num_rows() >0){
			$data['data'] = $rs->result_array();
			$data[0]= true;
		}
		 // return $data;
	}
	
	public function someinfo($lat,$lng){
		
		$sql="SELECT *, ( 3959 * acos( cos( radians($lat ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat ) ) * sin( radians( latitude ) ) ) ) AS distance FROM geonames HAVING distance < 10 ORDER BY distance LIMIT 0 , 1";
		$rs=$this->db->query($sql);
		if($rs->num_rows() >0){
			$data['data'] = $rs->result_array();
			$data[0]= true;
		}
		// return $data;
	}
}