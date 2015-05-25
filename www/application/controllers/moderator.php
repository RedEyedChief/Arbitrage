<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moderator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model',"content_model",'stat_model','data_model'));
		$this->load->database();
		$this->load->library('session');
		$this->load->library('Dataloader');
		$this->load->library('simple_html_dom');
		$this->load->helper("cookie");
		$this->load->helper("url");
		//$this->stat_model->viewCategory('dashboard');	//????? ??? ?????????? ???????
		$lang = $this->input->cookie("lang")==""?"ukrainian":$this->input->cookie("lang");	//?????????? ????
		$this->lang->load($lang,$lang);	//???????????? ??????????
	}
	
	/**
	 * ??????? ???????????? ??????? ??????? ?????, ????? ?????????
	 * @param var $ajax true, ???? ????? ???????????
	 * @return true None
	 */
	private function blocsBefore()
	{	
		$this->isLogged = $this->user_model->check_logged();
		
		$ajax = $this->input->post("ajax");
		if($this->isLogged)
		{
			$this->data['profile'] = $this->session->userdata("profile");
			$this->load->view('moderator/moderator_header',$this->data['profile']);
		}
		else
		{
			redirect('/', 'refresh');
		}
		
		if ($this->data['profile']['role'] != 4) redirect('/', 'refresh');
		
		$this->load->view('moderator/splitters/start_row');
		$this->load->view('moderator/toolbox');
	
	}
	
	/**
	 * ????? ???? ????????
	 * @param var $ajax true, ???? ????? ???????????
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
		$this->blocsBefore();
		$num = $this->data_model->get_num_markets();
		$data['num_city'] = $num[0]->num;
		$data['markets'] = $this->data_model->get_markets();
		$data['products'] = $this->data_model->get_products();
    		$this->load->view('general/map', $data);
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
	
	function testResult()
	{
		$start = $this->input->post('start');
		$depth = $this->input->post('depth');
		$c_dist = $this->input->post('c');
		$dis_products = $this->input->post('disabledProducts');
		$dis_markets = $this->input->post('disabledMarkets');
		$dis_products = json_decode($dis_products);
		$dis_markets = json_decode($dis_markets);
		$this->dataloader->load(intval($start),intval($depth),intval($c_dist), $dis_products, $dis_markets);
	}
	
	function map()
    	{
    		$this->blocsBefore();
		$num = $this->data_model->get_num_markets();
		$data['num_city'] = $num[0]->num;
		$data['markets'] = $this->data_model->get_markets();
		$data['products'] = $this->data_model->get_products();
    		$this->load->view('general/map', $data);
    		$this->load->view('admin/splitters/end_row');
    		$this->load->view('admin/admin_footer');

    	}
}
