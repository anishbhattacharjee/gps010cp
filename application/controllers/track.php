<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class track extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
	  	$this->load->helper(array('url', 'form', 'date'));
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
		$this->load->model('track_model');
		$this->load->model('action_model');
		$this->load->model('commonfunctions_model');
	  	$this->load->database(); 
        $this->load->library("pagination");
		if($this->session->userdata('customer_id') == ''){
			redirect('adminlogin');
		}
	}
	public function dashboard()
	{
		$data = array();
		if($this->session->userdata('customer_id') != ''){
			$data['page'] = $page = $this->uri->segment(2);
			$data['id'] = $id= $this->uri->segment(3);
			$data['userinfo']=$this->commonfunctions_model->getUserInfo();
			
			if(isset($page)){
				$folder=$this->commonfunctions_model->get_user_folder($id,$page);
				if("application/views/".$folder."/".$page.".php"){
					$data['folder'] = $folder;
				}
				else{
					$data['folder']="pages";
					$data['page']="error-404";
				}
			}else{
				$data['folder']="pages";
				$data['page']="error-404";
			}
	
		}
		if(isset($_GET['dev'])){
			$dev_model=$_GET['dev'];
			if(has_no_permission('live',$dev_model,$id)){
				header("Location: track.php?page=error-403&id=$id");
				exit();
			}
		}
		if($page=='invoices' && isset($_GET['inv'])){
			$inv=$_GET['inv'];
			if(has_no_permission('invoice',$inv,$id)){
				header("Location: index.php?page=error-403&id=$id");
				exit();
			}
		}
		else if($page=='mail' && isset($_GET['mail'])){
			$mail=$_GET['mail'];
			if(has_no_permission('mail',$mail,$id)){
				header("Location: index.php?page=error-403&id=$id");
				exit();
			}
		}
		else if($page=='ticket_detail' && isset($_GET['tkt'])){
			$tkt=$_GET['tkt'];
			if(has_no_permission('tkt',$tkt,$id)){
				header("Location: index.php?page=error-403&id=$id");
				exit();
			}
		}
		else if($page=='trip_report' && isset($_GET['id1'])){
			$tid=$_GET['id1'];
			if(has_no_permission('trip',$tid,$id)){
				header("Location: index.php?page=error-403&id=$id");
				exit();
			}
		}
		else if($page=='trip_status_report' && isset($_GET['id1'])){
			$tid=$_GET['id1'];
			if(has_no_permission('trip',$tid,$id)){
				header("Location: index.php?page=error-403&id=$id");
				exit();
			}
		}

		$data['rs'] = $this->track_model->GetTrackInfo();
	
		$this->load->view('dashboard',$data);
	}
	
}