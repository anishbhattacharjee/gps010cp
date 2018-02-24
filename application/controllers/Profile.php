<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('profile_model');
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
		$data['userinfo'] = $this->userinfo;
	    $data['dev_count']=$this->action_model->GetData('installation',array("count(instatllation_id) as cnt"),array('customer_id'=>$this->id,'installation_status'=>'completed'));
		$data['devices'] = $this->profile_model->getDeviceInfo();
		$this->load->view('dashboard',$data);
	}
	
	public function notifications(){
		$data['id'] = $this->uri->segment(3);
		$data['page'] = $this->page = $this->uri->segment(2);
		$data['folder'] = $this->folder;
		$data['userinfo'] = $this->userinfo;
	   
		$this->load->view('dashboard',$data);
	}
	
	public function mail(){
		$data['id'] = $this->uri->segment(3);
		$data['page'] = $this->page = $this->uri->segment(2);
		$data['note'] = $this->mail = $this->uri->segment(4);
		$data['folder'] = $this->folder;
		$data['userinfo'] = $this->userinfo;
	   
		$this->load->view('dashboard',$data);
	}
	
}