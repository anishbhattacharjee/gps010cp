<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('report_model');
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
		$data['reportid'] = $this->uri->segment(4);
		$data['cat'] = $this->uri->segment(5);
		$data['folder'] = $this->folder;
		$data['userinfo'] = $this->userinfo;
	   	$data['report_cat'] = $this->report_model->getReportCategories();
		$data['report']=$this->action_model->GetData('reports','',array('report_id'=>$data['reportid']));
		$data['cats']=$this->action_model->GetData('gps_categories','',array('category_id'=>$data['cat']));
		
		$data['dev'] = $this->report_model->GetReportData($data['id'],$data['reportid'],$data['cat']);
		
		$this->load->view('dashboard',$data);
	}
	
	public function report_dashboard(){
		$data['userinfo'] = $this->userinfo;
		$data['id'] = $this->id;
		$data['page'] = $this->page;
		$data['folder'] = $this->folder;
	   	$data['report_cat'] = $this->report_model->getReportCategories();
		$this->load->view('dashboard',$data);
	}
	
}