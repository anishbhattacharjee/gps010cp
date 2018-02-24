<?php
class Action_model extends CI_Model {

	public function GetData($table, $columns='', $where='',$limit='',$order='',$wrextra=''){
		$column = '';
		if($columns != ''){
			$i=1;
			foreach($columns as $clm){
				$column.=$clm;
				if($i < count($columns) ){
					$column.=", ";
				}
			$i++;
			}
		}else{
			$column.="*";
		}
		
		$wr='';
		if($where != ''){
			$wr.="where ";
			$j=1;
			foreach($where as $key => $value){
				$wr.=$key."="."'$value'";
				if($j < count($where)){
					$wr.=" and ";
				}
			$j++;
			}
			if($wrextra != ""){
				$wr.=" ".$wrextra;
			}
		}
		
		$lmt = '';
		if($limit != ''){
			$lmt.=" limit ".$limit;
		}
		
		$ord = '';
		if($order != ''){
			$ord.=" order by ".$order;
		}
		$sql="SELECT ".$column." from ".$table." ".$wr." ".$ord." ".$lmt.""; 
		//print_r($sql); exit;
		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			$data['data']=$rs->result_array();
			$data[0] = true;
		}else{
			$data[0]= false;
		}
		return $data;
	}
	
	public function get_table_details($table){
	   $this->db->select('*');
	   $this->db->from($table);
	   $query = $this->db->get();
	    if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->result();				
		}
	 }
	public function getpart_table_deatils($table,$column,$value){
		$this->db->select('*');
	   $this->db->from($table);
	   $this->db->where($column,$value); 
	   $query = $this->db->get();
	   if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->result();				
		}
	 }
	public function GetPartIn_table_deatils($table,$column,$value){	  $sql = "select * from ".$table." where ".$column." in(".$value.")";	  $query = $this->db->query($sql);	   if($query->num_rows() ==''){			return '';					}else{			return $query->result();						}	}
	public function add_record($table,$data,$id=null,$where=null){
			if($id == 0){
				$this->db->insert($table,$data);
				$lastid=$this->db->insert_id();
				return $lastid;
			}else{
				$this->db->update($table,$data,$where);
				return true;
			}
	   }
	public function update_record($table,$id,$status,$where){
		if($status == 2)
			{	
				if ($this->db->delete($table, $where)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$data = array(
					'Status' => $status
				);
				if ($this->db->update($table, $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
	}
}