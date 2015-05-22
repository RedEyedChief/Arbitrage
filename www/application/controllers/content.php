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
		$this->data="";
	}
	
	/**
	 * Змінити мову
	 * @param object $lang мова
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
	 * Отримати новини
	 * @return json структура з новинами
	 */
	public function getNews()
	{
		$begin = $this->input->post("begin");
		$count = $this->input->post("count");
		$end = $begin+$count;
		print(json_encode($this->content_model->getNews($begin, $end)));
	}
	
	/**
	 * Видалити новину
	 * @return true  None
	 */
	public function removeArticles()
	{
		if($this->isLogged >= 3) $this->content_model->removeArticle($this->input->post("id"));
	}
	
	/**
	 * Видалити користувача
	 * @return true  None
	 */
	public function removeUsers()
	{
		if($this->isLogged >= 3) $this->content_model->removeUser($this->input->post("id"));
	}
	
	/**
	 * Видалити користувача
	 * @return true  None
	 */
	public function removeProducts()
	{
		if($this->isLogged >= 3) $this->content_model->removeProduct($this->input->post("id"));
	}
	
	/**
	 * Видалити користувача
	 * @return true  None
	 */
	public function removePrices()
	{
		if($this->isLogged >= 3) $this->content_model->removePrice($this->input->post("id"));
	}
	
	/**
	 * Видалити користувача
	 * @return true  None
	 */
	public function removeCities()
	{
		if($this->isLogged >= 3) $this->content_model->removeCity($this->input->post("id"));
	}
	
	/**
	 * Додати комент
	 * @return json  комент
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
	 * Додати новину
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
	 * Додати опитування
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
	 * зарахувати голос в опитуванні
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
	
	
	public function getUsersFields()
	{
		echo json_encode($this->content_model->getUserFields($this->input->post("id")));
	}
	
	public function getProductsFields()
	{
		echo json_encode($this->content_model->getProductFields($this->input->post("id")));
	}
	
	public function getCitiesFields()
	{
		echo json_encode($this->content_model->getCityFields($this->input->post("id")));
	}
	
	public function getNewsFields()
	{
		echo json_encode($this->content_model->getNewsFields($this->input->post("id")));
	}
	
	public function getPricesFields()
	{
		echo json_encode($this->content_model->getPriceFields($this->input->post("id")));
	}
	
	//public function addUsers()
	//{
	//	$this->data['users'] = $this->content_model->addUser($this->input->post(null));
	//	$this->data['async'] = true;
	//	$this->load->view('admin/lists/users_list',$data);
	//}
	
	public function addProducts()
	{
		$this->data['products'] = $this->content_model->addProduct($this->input->post(null));
		$this->data['async'] = true;
		$this->load->view('admin/lists/products_list',$this->data);
	}
	
	public function addPrices()
	{
		$this->data['prices'] = $this->content_model->addPrice($this->input->post(null));
		$this->data['async'] = true;
		$this->load->view('admin/lists/prices_list',$this->data);
	}
	
	public function addCity()
	{
		$this->data['cities'] = $this->content_model->addCity($this->input->post(null));
		$this->data['async'] = true;
		$this->load->view('admin/lists/cities_list',$this->data);
	}
	
	public function updateUsers()
	{
		$this->content_model->updateUser($this->input->post(null));
		$this->data['users'] = $this->user_model->getProfileInfo($this->input->post('idProfile'));
		$this->data['async'] = true;
		$this->load->view('admin/lists/users_list',$this->data);
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */