<?php
class Geofence_model extends CI_Model {	
	public function GetFences(){
		$page = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		
		
		$sql="SELECT

			geo_fence.fence_id,

			geo_fence.customer_id,

			geo_fence.device_id,

			geo_fence.points,

			geo_fence.fence_status,

			geo_fence.fence_name,

			geo_fence.ts,

			installation.device_name

			FROM

			geo_fence

			INNER JOIN installation ON geo_fence.device_id = installation.model_id

			WHERE geo_fence.customer_id=$id group by ts";
		
		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			$fences['data']=$rs->result_array();
			$fences[0] = true;
		}else{
			$fences[0]= false;
		}
		return $fences;
	}
	
	public function GetDevices(){
	$page = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		
		$sql="SELECT

		installation.model_id,

		installation.device_name

		FROM

		installation

		WHERE installation_status='completed' AND customer_id=$id and category_id!=4";
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