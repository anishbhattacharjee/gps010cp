<?php
class User_model extends CI_Model {


public function validate_user()

{
				$query=$this->db->where('customer_uid',$this->input->post('username'));

				$query=$this->db->where('password',$this->input->post('password'));

				//$query=$this->db->where('user_type','admin');

				$query=$this->db->get('customers');
				//echo $this->db->last_query(); exit;
				
				if($query->num_rows() > 0)

				{
					$qs=$query->result_array();
					$qs = $qs[0];
					
					return $qs;

				}

}

public function validate_engineer()

{

				$query=$this->db->where('engineers_email',$this->input->post('username'));

				$query=$this->db->where('engineers_uniqid',$this->input->post('password'));

				$query=$this->db->where('designation','Helpdesk');

				$query=$this->db->get('engineers');

				if($query->num_rows() == 1)

				{

					return true;

				}

}

}