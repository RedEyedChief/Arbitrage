<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model',"content_model",'stat_model'));
		$this->load->database();
		$this->load->library('session');
		$this->load->helper("cookie");
		//$this->stat_model->viewCategory('index');
		$lang = $this->input->cookie("lang")==""?"ukrainian":$this->input->cookie("lang");
		$this->lang->load($lang,$lang);
		
	}
	
	/**
	 * ������� ������������ ������� ������� �����, ����� ���������
	 * @param var $ajax true, ���� ����� �����������
	 * @return true None
	 */
	private function blocsBefore($ajax)
	{
		if(!$ajax)
		{
			if($this->isLogged>0)
			{
				$this->data['profile'] = $this->session->userdata("profile");
				$this->load->view('site/site_header',$this->data['profile']);
				$this->data['isLogged'] = true;
				
				$this->load->view('site/site_main', $this->data);
				//$this->load->view('site/left-menu/site_left');
			}
			else
			{
				$this->load->view('site/site_header');
				$this->data['isLogged'] = false;
				$this->load->view('site/site_main', $this->data);
				//$this->load->view('site/left-menu/site_menu');
			}
			
			//$result = $this->content_model->getRandomPoll();
			//$res['poll'] = $result;
			//$poll_id = $result[0]->idPoll;
			//if($this->input->cookie("Poll".$poll_id)) $this->load->view('site/poll/site_poll',$res);
			//else $this->load->view('site/poll/site_poll_form',$res);
			//$this->load->view('site/site_split_left'); // End of left block
		}
	}
	
	/**
	 * ����� ���� ��������
	 * @param var $ajax true, ���� ����� �����������
	 * @return true None
	 */
	private function blocksAfter($ajax)
	{
		if($this->isLogged>0)
		{
			$this->load->helper('form');
			//$this->load->view('site/site_moderator');
		}
		if(!$ajax)
		{
			//$this->load->view('site/site_split_content'); // End of content
			$this->load->view('site/site_footer');
		}
	}
	
	function index()
	{
		//$this->data['news'] = $this->content_model->getNews();
		$this->isLogged = $this->user_model->check_logged();
		
		$this->stat_model->insertLog("visit","site");

		$ajax = $this->input->post("ajax");
		$this->blocsBefore($ajax);
		
		//$this->load->view('site/site_main');
		
		$this->blocksAfter($ajax);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */