<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('settings_model');
		$this->load->model('action_model');
		$this->load->model('commonfunctions_model');
	  	$this->load->database(); 
        $this->load->library("pagination");
		if($this->session->userdata('customer_id') == ''){
			redirect('adminlogin');
		}else{
			$this->page = $this->uri->segment(2);
			$this->id = $this->uri->segment(3);
			$this->userinfo=$this->commonfunctions_model->getUserInfo();
			if(isset($this->page)){
				$folder=$this->commonfunctions_model->get_user_folder($this->id,$this->page);
				if("application/views/".$folder."/".$this->page.".php"){
					$this->folder = $folder;
				}
				else{
					$this->folder="pages";
					$this->page="error-404";
				}
			}else{
				$this->folder="pages";
				$this->page="error-404";
			}
		}
	}
	
	public function index(){
		$data['id'] = $this->id;
		$data['page'] = $this->page = $this->uri->segment(1);
		$data['folder'] = $this->folder;
		$data['rw']=$this->action_model->GetData('alert_control','',array('customer_id'=>$this->id));
		$data['rn'] = $this->action_model->GetData('installation',array('instatllation_id','device_name'),array('customer_id'=>$this->id)); 
		$data['ph'] = $this->action_model->GetData('customers',array('customer_phone_no','is_sublogin','sublogin_id',
		'is_school',),array('customer_id'=>$this->id)); 
		$this->load->view('dashboard',$data);
	}
	
}