<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trip extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('trip_model');
		$this->load->model('track_model');
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
		$this->load->view('dashboard',$data);
	}
	
	public function trip_view(){
		$data['userinfo'] = $this->userinfo;
		$data['id'] = $this->id;
		$data['id1'] = $this->uri->segment(4);
		$data['page'] = $this->page;
		$data['folder'] = $this->folder;
		$this->load->view('dashboard',$data);
	}
	public function trip_report(){
		$data['userinfo'] = $this->userinfo;
		$data['id'] = $this->id;
		$data['id1'] = $this->uri->segment(4);
		$data['page'] = $this->page;
		$data['folder'] = $this->folder;
		$data['trips']=$this->action_model->GetData('trip_schedule','',array('id'=>$data['id1']));
		
		$this->load->view('dashboard',$data);
	}
	
	public function trip_new(){
		$data['userinfo'] = $this->userinfo;
		$data['id'] = $this->id;
		$data['id1'] = $this->uri->segment(4);
		$data['page'] = $this->page;
		$data['userinfo'] = $this->userinfo;
		$data['folder'] = $this->folder;
		$data['dev']=$this->action_model->GetData("installation",array('imie_no','device_name'),
		array('installation_status'=>'completed', 'customer_id'=> $this->id) );
		$this->load->view('dashboard',$data);
	}
	
	public function status_update(){
		$postdata = $this->input->post('submit');
		if(isset($postdata)){
			if($this->input->post('action')=='activate'){
				$sql="update trip_schedule set trip_status='Active' where id=".$this->input->post('tid');
				$this->db->query($sql);
				redirect('index/'.$this->id);
			}else if($this->input->post('action')=='deactivate'){
				$sql="update trip_schedule set trip_status='Inactive' where id=".$this->input->post('tid');
				$this->db->query($sql);
				redirect('index/'.$this->id);
			}
			
		}
	}
}