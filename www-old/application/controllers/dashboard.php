<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model',"content_model",'stat_model'));
		$this->load->database();
		$this->load->library('session');
		$this->load->helper("cookie");
		$this->stat_model->viewCategory('dashboard');
		$lang = $this->input->cookie("lang")==""?"ukrainian":$this->input->cookie("lang");
		$this->lang->load($lang,$lang);
	}
	
	//public function index()
	//{
	//	$this->load->view('admin/admin_header');
	//	$this->load->view('admin/admin_upper');
	//	$this->load->view('admin/admin_lower');
	//	$this->load->view('admin/admin_view');
	//}
	
	private function blocsBefore($ajax)
	{
		if(!$ajax)
		{
			if($this->isLogged)
			{
				$this->data['profile'] = $this->session->userdata("profile");
				$this->load->view('admin/admin_header',$this->data['profile']);
			}
			else
			{
				//redirect
			}
		}
	}
	
	private function blocksAfter($ajax)
	{
		if(!$ajax)
		{
			$this->load->view('site/site_split_content'); // End of content
			$this->load->view('site/site_footer');
		}
	}
	
	function index()
	{
		$this->isLogged = $this->user_model->check_logged();
		
		$ajax = $this->input->post("ajax");
		$this->blocsBefore($ajax);
		
		$this->load->view('admin/splitters/start_row');
		$this->load->view('admin/toolbox');
		$this->load->view('admin/admin_upper');
		$this->load->view('admin/splitters/end_row');
		$this->data['news'] = $this->content_model->getNews();
		$this->load->view('admin/news_list',$this->data);
		
		$this->data['polls'] = $this->content_model->getPolls();
		$this->load->view('admin/poll_list',$this->data);
		$this->load->view('admin/admin_view');
		
		//$this->blocksAfter($ajax);
	}
	
	function user()
	{
		$this->isLogged = $this->user_model->check_logged();
		
		$ajax = $this->input->post("ajax");
		$this->blocsBefore($ajax);
		
		$this->load->view('admin/splitters/start_row');
		$this->load->view('admin/toolbox');
		$this->load->view('admin/admin_upper');
		$this->load->view('admin/splitters/end_row');
		$this->data['news'] = $this->content_model->getNews();
		$this->load->view('admin/news_list',$this->data);
		
		$this->data['polls'] = $this->content_model->getPolls();
		$this->load->view('admin/poll_list',$this->data);
		$this->load->view('admin/admin_view');
	}
}
