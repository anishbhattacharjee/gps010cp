<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('user_model');
	  	$this->load->database(); 
        $this->load->library("pagination");
	}
	public function index()
	{
		$aa=$this->uri->segment(3);
		$data['msg3']=urldecode($aa);
		$this->load->view('adminlogin',$data);
	}
	public function validate()
	{
		
		  $sessionUserInfo=$this->user_model->validate_user();
			
		   $this->session->set_userdata($sessionUserInfo);
			$id= $sessionUserInfo['customer_id'];		
			if($id > 0)
			{
			
				if($id==444)
				{
					redirect('track/orange/'.$id, 'refresh'); 
				}
				elseif($id==262|| $id==442)
				{
					redirect('track/national_flex/'.$id, 'refresh'); 
				}
				else if($sessionUserInfo['account_type']=='demo')
				{

					redirect('track/dashboard/'.$id, 'refresh');
				}
				else
				{

					if($id==225)
					{
						//header("Location: ../c/track.php?page=dashboard&id=$id");
					}
					else 
					{
							redirect('track/dashboard/'.$id, 'refresh');
					}
					
				}
			}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('sessionUserInfo');	
		$this->index();	
	}
}