<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model',"content_model",'stat_model'));
		$this->load->database();
		$this->load->library('session');
		$this->load->library('simple_html_dom');
		$this->load->helper("cookie");
		$this->load->helper("url");
		//$this->stat_model->viewCategory('dashboard');	//����� ��� ���������� �������
		$lang = $this->input->cookie("lang")==""?"ukrainian":$this->input->cookie("lang");	//���������� ����
		$this->lang->load($lang,$lang);	//������������ ����������
	}
	
	/**
	 * ������� ������������ ������� ������� �����, ����� ���������
	 * @param var $ajax true, ���� ����� �����������
	 * @return true None
	 */
	private function blocsBefore()
	{	
		$this->isLogged = $this->user_model->check_logged();
		
		$ajax = $this->input->post("ajax");
		if($this->isLogged)
		{
			$this->data['profile'] = $this->session->userdata("profile");
			$this->load->view('admin/admin_header',$this->data['profile']);
		}
		else
		{
			redirect('/', 'refresh');
		}
		
		if ($this->data['profile']['role'] != 4) redirect('/', 'refresh');
		
		$this->load->view('admin/splitters/start_row');
		$this->load->view('admin/toolbox');
	
	}
	
	/**
	 * ����� ���� ��������
	 * @param var $ajax true, ���� ����� �����������
	 * @return true None
	 */
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
		//$this->isLogged = $this->user_model->check_logged();	//�������� ��������������
		//
		//$ajax = $this->input->post("ajax");
		//$this->blocsBefore($ajax);
		//
		//$this->load->view('admin/splitters/start_row');
		//$this->load->view('admin/toolbox');
		//$this->load->view('admin/admin_upper');
		//$this->load->view('admin/splitters/end_row');
		//$this->data['users'] = $this->content_model->getUsers();
		//$this->load->view('admin/user_list',$this->data);
		
		///*$this->data['polls'] = $this->content_model->getPolls();
		//$this->load->view('admin/poll_list',$this->data);*/
		//$this->load->view('admin/admin_view');
		//
		////$this->blocksAfter($ajax);
		$this->blocsBefore();
		//$this->load->view('admin/splitters/start_row');
		//
		//$this->data['news'] = $this->content_model->getNews();
		//$this->load->view('admin/news_list',$this->data);
		//
		//$this->data['polls'] = $this->content_model->getPolls();
		//$this->load->view('admin/poll_list',$this->data);
		//
		
		$this->load->view('admin/admin_control');
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}
	
	function stats()
	{
		$this->blocsBefore();
		$this->load->view('admin/admin_upper');
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}
	
	function users()
	{
		$this->blocsBefore();
		$start = $this->input->get('start')!=''?$this->input->get('start'):0;
		$end = $this->input->get('end')!=''?$this->input->get('end'):10;
		$this->data['users'] = $this->content_model->getUsers($start,$end);
		$this->data['async']=false;
		$this->data['num']=$this->content_model->getUsersNum();
		$this->load->view('admin/lists/users_list',$this->data);
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}
	
	function news()
	{
		$this->blocsBefore();
		$start = $this->input->get('start')!=''?$this->input->get('start'):0;
		$end = $this->input->get('end')!=''?$this->input->get('end'):10;
		$this->data['news'] = $this->content_model->getNews();
		$this->data['async']=false;
		$this->data['num']=$this->content_model->getNewsNum();
		$this->load->view('admin/lists/news_list',$this->data);
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}
	
	function products()
	{
		$this->blocsBefore();
		$start = $this->input->get('start')!=''?$this->input->get('start'):0;
		$end = $this->input->get('end')!=''?$this->input->get('end'):10;
		$this->data['products'] = $this->content_model->getProducts();
		$this->data['async']=false;
		$this->data['num']=$this->content_model->getProductsNum();
		$this->load->view('admin/lists/products_list',$this->data);
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}
	
	function cities()
	{
		$this->blocsBefore();
		$start = $this->input->get('start')!=''?$this->input->get('start'):0;
		$end = $this->input->get('end')!=''?$this->input->get('end'):10;
		$this->data['cities'] = $this->content_model->getCities();
		$this->data['async']=false;
		$this->data['num']=$this->content_model->getCitiesNum();
		$this->load->view('admin/lists/cities_list',$this->data);
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}
	
	function prices()
	{
		$this->blocsBefore();
		$start = $this->input->get('start')!=''?$this->input->get('start'):0;
		$end = $this->input->get('end')!=''?$this->input->get('end'):10;
		$this->data['prices'] = $this->content_model->getPrices();
		$this->data['async']=false;
		$this->data['num']=$this->content_model->getPricesNum();
		$this->load->view('admin/lists/prices_list',$this->data);
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}

	//Machulyanskiy
	function parsing()
    {
    	$this->blocsBefore();
    	$this->data['html'] = file_get_html('http://hotline.ua/knigi/');
    	//print_r($this->data['html']);
    	//$this->load->view('admin/parsing_view', $this->data);
    	$this->load->view('admin/parsing_view2', $this->data);
    	//$this->load->view('admin/parsing_view2');
    	/*$parserName = $this->input->post('parserName', TRUE);
    	echo $parserName;*/
    	//$this->data['html']->clear();
    	$this->load->view('admin/splitters/end_row');
    	$this->load->view('admin/admin_footer');

    }

	//Machulyanskiy: processing the request to the source
    function parsing_request()
    {
		$parserURL = $this->input->post('parserURL', TRUE);
		$parserRule = $this->input->post('parserRule', TRUE);

		//save object of parsing to db
		//$this->content_model->saveOP($parserURL, $parserRule);

		$count = 0;
		$this->data['html'] = file_get_html($parserURL);

		foreach ($this->data['html']->find('ul[class=book-tabl] li') as $element) //'ul[class=book-tabl] li'	    "'" . $parserRule . "'"
		{
			$count++;
			$str = iconv("utf-8","windows-1251",$element->plaintext);
			$arr[] =  array('count' =>$count, 'info' => $element->plaintext);
		}

		$this->data['html'] -> clear();
        unset($this->data['html']);

		echo json_encode($arr);
    }

	//Machulyanskiy: processing the element OP
    function element_OP()
    {
    	$parserName = $this->input->post('parserName', TRUE);
        $parserPrice = $this->input->post('parserPrice', TRUE);
        $parserSeller = $this->input->post('parserSeller', TRUE);

		/*$error = $this->content_model->save_element_OP($parserName, $parserPrice, $parserSeller);

		if($error == null)		echo json_encode(array('status' => 'ok');*/
		echo json_encode(array('status' => 'ok'));
    }
}
