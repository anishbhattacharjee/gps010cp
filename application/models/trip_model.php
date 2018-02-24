<?php
class Trip_model extends CI_Model {

	public function getTripScheduleInfo(){
		$page = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		
		$sql="SELECT t.id,i.device_name,t.trip_name,t.start_time,t.end_time,t.start_point,t.end_point,t.trip_status,t.created_at FROM trip_schedule t 
		left join installation i on t.imei=i.imie_no and i.customer_id=$id WHERE t.customer_id=$id and t.trip_status!= 'Deleted' order by t.id desc"; 

		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			$trips['data']=$rs->result_array();
			$trips[0] = true;
		}else{
			$trips[0]= false;
		}
		return $trips;
	}


	public function getTripView($id,$page,$id1){
		$sqln="select * from trip_schedule where id=$id1";
		$rsn=$this->db->query($sqln);
		if($rsn->num_rows() > 0){
			$data['rw']=$rsn->result_array();
			 $sq="select id,tag,tag_name from trip_tags where trip_id=$id1";
			 $rs=$this->db->query($sq);
			 if($rs->num_rows() > 0){
				$data['rs']=$rs->result_array();
			 }
			$data[0] = true;
		}else{
			$data[0] = false;
		}
		return $data;
	}
}