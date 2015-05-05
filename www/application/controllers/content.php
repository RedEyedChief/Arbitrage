<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('content_model','user_model'));
		$this->load->helper('url','cookie');
		$this->load->database();
		$this->load->library("session");
		$this->isLogged = $this->user_model->check_logged();
		if($this->isLogged) $this->data['profile'] = $this->session->userdata("profile");
		else $this->isLogged = false;
		$lang = $this->input->cookie("lang")==""?"ukrainian":$this->input->cookie("lang");
		$this->lang->load($lang,$lang);
	}
	
	/**
	 * ������ ����
	 * @param object $lang ����
	 * @return true  None
	 */
	public function lang($lang)
	{
		//die($lang);
		$cookie = array(
			'name' => 'lang',
			'value' => $lang,
			'expire' => time()+86000500,
			'path'   => '/',
		);
		$this->input->set_cookie($cookie);
		redirect(current_url());
	}
	
	/**
	 * �������� ������
	 * @return json ��������� � ��������
	 */
	public function getNews()
	{
		$begin = $this->input->post("begin");
		$count = $this->input->post("count");
		$end = $begin+$count;
		print(json_encode($this->content_model->getNews($begin, $end)));
	}
	
	/**
	 * �������� ������
	 * @return true  None
	 */
	public function removeArticle()
	{
		if($this->isLogged) $this->content_model->removeArticle($this->input->post("id"));
	}
	
	/**
	 * ������ ������
	 * @return json  ������
	 */
	public function addComment()
	{
		if($this->isLogged)
		{
			$this->content_model->addComment($this->input->post("article"),$this->input->post("text"),$this->data['profile']['mail'],$this->data['profile']['idProfile']);
			echo json_encode(array(
					       "text"=>$this->input->post("text"),
					       "user"=>$this->data['profile']['mail'],
					       "date"=>date("Y-m-d H:m:s")
					      ));
		}
		
	}
	
	/**
	 * ������ ������
	 * @return true  None
	 */
	public function writePost() //DEPRECATED
	{
		if($this->isLogged)
		{
			$this->load->library('form_validation');
			$data = $this->input->post(NULL);
			$this->content_model->writeArticle($data['title'],$data['description'],$data['text'],$this->data['profile']['idProfile']);
			redirect('', 'refresh');
		}
	}
	
	/**
	 * ������ ����������
	 * @return true  None
	 */
	public function addPoll()
	{
		$this->load->library('form_validation');
		$data = $this->input->post(NULL);
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('textPollVote', 'Variants', 'required|xss_clean');
		if($this->form_validation->run() == false)
		{
			redirect('', 'refresh');
		}
		else
		{
			$this->content_model->addPoll($data['title'],$data['textPollVote'],1);
			redirect('', 'refresh');
		}
	}
	
	/**
	 * ���������� ����� � ����������
	 * @return true  None
	 */
	function votePoll()
	{
		$this->load->library('form_validation');
		$data = $this->input->post(NULL);
		$this->form_validation->set_rules('optionsRadios', 'Option', 'trim|required|xss_clean');
		if($this->form_validation->run() == false)
		{
			redirect('', 'refresh');
		}
		else
		{
			$this->content_model->votePoll($data['id'],$data['optionsRadios']);
			$cookie = array(
				'name' => 'Poll'.$data['id'],
				'value' => $data['optionsRadios'],
				'expire' => time()+86500,
				'path'   => '/',
			);
			$this->input->set_cookie($cookie);
			$result = $this->content_model->getPoll($data['id']);
			$res['poll'] = $result;
			$this->load->view("site/poll/site_poll",$res);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */