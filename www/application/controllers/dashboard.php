<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model',"content_model",'stat_model'));
		$this->load->database();
		$this->load->library('session');
		$this->load->library('Dataloader');
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
		//$this->Dataloader->some_function();
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
	
	function parsing()
    	{
    		$this->blocsBefore();
    		$this->data['html'] = file_get_html('http://hotline.ua/knigi/');
    		//$this->load->view('admin/parsing_view', $this->data);
    		$this->load->view('admin/parsing_view2', $this->data);
    		$parserName = $this->input->post('parserName', TRUE);
    		echo $parserName;
    		//$this->data['html']->clear();
    		$this->load->view('admin/splitters/end_row');
    		$this->load->view('admin/admin_footer');

    	}
	
	function testResult($start)
	{
		$this->dataloader->load(intval($start));
	}
	
	function map()
    	{
    		$this->blocsBefore();
    		$this->load->view('general/map');
    		$this->load->view('admin/splitters/end_row');
    		$this->load->view('admin/admin_footer');

    	}
}
