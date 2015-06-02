<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('content_model','user_model', 'stat_model'));
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
	
	public function getChartData()
	{
		try{
			$data['visits'] = $this->stat_model->selectLogs("visit");
			$data['algo'] = $this->stat_model->selectLogs("algo");
			$data['login'] = $this->stat_model->selectLogs("login");
			echo json_encode(array("data"=>$data,"status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
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
		try{
			if($this->isLogged >= 3) $this->content_model->removeUser($this->input->post("id"));
			json_encode(array("status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	/**
	 * Видалити користувача
	 * @return true  None
	 */
	public function removeProducts()
	{
		try{
			if($this->isLogged >= 3) $this->content_model->removeProduct($this->input->post("id"));
			json_encode(array("status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	/**
	 * Видалити користувача
	 * @return true  None
	 */
	public function removeItems()
	{
		try{
			if($this->isLogged >= 3) $this->content_model->removeItem($this->input->post("id"));
			json_encode(array("status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	/**
	 * Видалити користувача
	 * @return true  None
	 */
	public function removePrices()
	{
		try{
			if($this->isLogged >= 3) $this->content_model->removePrice($this->input->post("id"));
			json_encode(array("status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
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
		try{
			echo json_encode(array("data"=>$this->content_model->getUserFields($this->input->post("id")),
					       "status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function getProductsFields()
	{
		try{
			echo json_encode(array("data"=>$this->content_model->getProductFields($this->input->post("id")),
					       "status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function getItemsFields()
	{
		try{
			echo json_encode(array("data"=>$this->content_model->getItemFields($this->input->post("id")),
					       "status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function getCitiesFields()
	{
		try{
			echo json_encode(array("data"=>$this->content_model->getCityFields($this->input->post("id")),
					       "status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function getNewsFields()
	{
		echo json_encode(array("data"=>$this->content_model->getNewsFields($this->input->post("id")),
					       "status"=>true));
	}
	
	public function getPricesFields()
	{
		try{
			echo json_encode(array("data"=>$this->content_model->getPricesFields($this->input->post("id")),
					       "status"=>true));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	//public function addUsers()
	//{
	//	$this->data['users'] = $this->content_model->addUser($this->input->post(null));
	//	$this->data['async'] = true;
	//	$this->load->view('admin/lists/users_list',$data);
	//}
	
	public function addProducts()
	{
		try{
			$this->data['products'] = $this->content_model->addProduct($this->input->post(null));
			$this->data['async'] = true;
			echo json_encode(array("data"=>$this->load->view('admin/lists/products_list',$this->data,true),
					       'status'=>($this->data['products']!=false)));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function addItems()
	{
		try{
			$this->data['items'] = $this->content_model->addItem($this->input->post(null));
			$this->data['async'] = true;
			echo json_encode(array('data'=>$this->load->view('admin/lists/items_list',$this->data,true),
					       'status'=>($this->data['items']!=false)));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function addPrices()
	{
		try{
			$this->data['prices'] = $this->content_model->addPrice($this->input->post(null));
			$this->data['async'] = true;
			echo json_encode(array('data'=>$this->load->view('admin/lists/prices_list',$this->data,true),
					       'status'=>($this->data['prices']!=false)));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function addCity()
	{
		$this->data['cities'] = $this->content_model->addCity($this->input->post(null));
		$this->data['async'] = true;
		$this->load->view('admin/lists/cities_list',$this->data);
	}
	
	public function updateUsers()
	{
		try{
			$this->content_model->updateUser($this->input->post(null));
			$this->data['users'] = $this->user_model->getProfileInfo($this->input->post('idProfile'));
			$this->data['async'] = true;
			echo json_encode(array('data'=>$this->load->view('admin/lists/users_list',$this->data,true),
					       'status'=>($this->data['users']!=false)));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function updateItems()
	{
		try{
			$this->content_model->updateItem($this->input->post(null));
			$this->data['items'] = $this->content_model->getItem($this->input->post('idItem'));
			$this->data['async'] = true;
			echo json_encode(array('data'=>$this->load->view('admin/lists/items_list',$this->data,true),
					       'status'=>($this->data['items']!=false)));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function updateProducts()
	{
		try{
			$this->content_model->updateProduct($this->input->post(null));
			$this->data['products'] = $this->content_model->getProducts(0,1,$this->input->post('idProduct'));
			$this->data['async'] = true;
			echo json_encode(array('data'=>$this->load->view('admin/lists/products_list',$this->data,true),
					       'status'=>($this->data['products']!=false)));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
	
	public function updatePrices()
	{
		try{
			$this->content_model->updatePrice($this->input->post(null));
			$this->data['prices'] = $this->content_model->getPrices(0,1,$this->input->post('idPrices'));
			$this->data['async'] = true;
			echo json_encode(array('data'=>$this->load->view('admin/lists/prices_list',$this->data,true),
					       'status'=>($this->data['prices']!=false)));
		}catch(Exception $e)
		{
			json_encode(array("status"=>false));
		}
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */