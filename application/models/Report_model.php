<?php
class Report_model extends CI_Model {

	public function getReportCategories(){
		$page = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		
		$sql="SELECT
			DISTINCT
			installation.category_id,
			gps_categories.category_type
			FROM
			installation
			INNER JOIN gps_categories ON installation.category_id = gps_categories.category_id
			WHERE customer_id=$id AND installation_status='completed'  and installation.category_id!=4";

		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			$cat['data']=$rs->result_array();
			$cat[0] = true;
		}else{
			$cat[0]= false;
		}
		return $cat;
	}


	public function GetReportData($id,$reportid,$catid){
		if($id==502){
			$sql="SELECT

			installation.model_id,

			installation.device_name,
			installation.imie_no,

			gps_model_details.imie_number

			FROM

			installation

			INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id

			WHERE installation_status='completed' AND customer_id=$id";
				
			}else{
				
			$sql="SELECT

			installation.model_id,

			installation.device_name,
			installation.imie_no,

			gps_model_details.imie_number

			FROM

			installation

			INNER JOIN gps_model_details ON installation.model_id = gps_model_details.model_id

			WHERE installation_status='completed' AND customer_id=$id and category_id=$catid";
			}
		
		$rsn=$this->db->query($sql);
		if($rsn->num_rows() > 0){
			$data['data']=$rsn->result_array();
			$data[0] = true;
		}else{
			$data[0] = false;
		}
		return $data;
	}
}