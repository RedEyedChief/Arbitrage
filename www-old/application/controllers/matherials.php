<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matherials extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('content_model','user_model','stat_model'));
		$this->load->helper('url','cookie');
		$this->load->library("session");
		$this->load->database();
		$this->stat_model->viewCategory('matherials');
		$lang = $this->input->cookie("lang")==""?"ukrainian":$this->input->cookie("lang");
		$this->lang->load($lang,$lang);
	}
	
	private function blocsBefore($ajax)
	{
		if($this->isLogged) $this->data['profile'] = $this->session->userdata("profile");
		if(!$ajax)
		{
			if($this->isLogged)
			{
				$this->load->view('site/site_header',$this->data['profile']);
				
				$this->load->view('site/left-menu/site_left');
			}
			else
			{
				$this->load->view('site/site_header');
				$this->load->view('site/left-menu/site_menu');
			}
			
			$result = $this->content_model->getRandomPoll();
			$res['poll'] = $result;
			$poll_id = $result[0]->idPoll;
			if($this->input->cookie("Poll".$poll_id)) $this->load->view('site/poll/site_poll',$res);
			else $this->load->view('site/poll/site_poll_form',$res);
			$this->load->view('site/site_split_left'); // End of left block
		}
	}
	
	private function blocksAfter($ajax)
	{
		if($this->isLogged)
		{
			$this->load->helper('form');
			$this->load->view('site/site_moderator');
		}
		if(!$ajax)
		{
			$this->load->view('site/site_split_content'); // End of content
			$this->load->view('site/site_footer');
		}
	}
	
	function index()
	{	
		$this->data['news'] = $this->content_model->getNews();
		$this->isLogged = $this->user_model->check_logged();
		
		$ajax = $this->input->post("ajax");
		$this->blocsBefore($ajax);
		
		$this->load->view('site/site_content2',$this->data);
		
		$this->blocksAfter($ajax);
	}
	
	function my()
	{
		$this->isLogged = $this->user_model->check_logged();
		
		$ajax = $this->input->post("ajax");
		$this->blocsBefore($ajax);
		
		$this->data['news'] = $this->content_model->getNews(0,10,$this->data['profile']['idProfile']);
		$this->load->view('site/site_content2',$this->data);
		
		$this->blocksAfter($ajax);
	}
	
	function article($id)
	{	
		$this->stat_model->viewArticle($id);
		$this->isLogged = $this->user_model->check_logged();
		
		$ajax = $this->input->post("ajax");
		$this->blocsBefore($ajax);
		
		$this->data['isLogged'] = $this->isLogged;
		$this->data['news'] = $this->content_model->getArticle($id);
		$this->data['comments'] = $this->content_model->getComments($id);
		$this->load->view('site/matherials/site_article',$this->data);
		$this->load->view('site/matherials/site_article_comments',$this->data);
		
		$this->blocksAfter($ajax);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */