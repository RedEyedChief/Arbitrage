<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {
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
		//$this->Dataloader->some_function();
		//$this->isLogged = $this->user_model->check_logged();	//???????? ??????????????
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
		$this->load->view('admin/admin_stats');
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
	
//	function parsing()
//    	{
//    		$this->blocsBefore();
//    		$this->data['html'] = file_get_html('http://hotline.ua/knigi/');
//    		//$this->load->view('admin/parsing_view', $this->data);
//    		$this->load->view('admin/parsing_view2', $this->data);
//    		$parserName = $this->input->post('parserName', TRUE);
//    		echo $parserName;
//    		//$this->data['html']->clear();
//    		$this->load->view('admin/splitters/end_row');
//    		$this->load->view('admin/admin_footer');
//    	}
	
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
function parsing()
    {
    	$this->blocsBefore();
    	$this->data['html'] = file_get_html('http://hotline.ua/knigi/');
    	//$this->data['parser'] = $this->content_model->get_OP();

    	$this->load->view('admin/parsing_view');
    	$this->load->view('admin/splitters/end_row');
    	$this->load->view('admin/admin_footer');

    }

	//Machulyanskiy: processing the request to the source
    function parsing_request()
    {
		$parserURL = $this->input->post('parserURL', TRUE);
		$parserRule = $this->input->post('parserRule', TRUE);
		$parserProductType = $this->input->post('parserProductType', TRUE);
		$parserCategory = $this->input->post('parserCategory', TRUE);

		$headers = @get_headers($parserURL);

        if($headers[0] == 'HTTP/1.1 200 OK')
        {
        			$count = 0;
        			$this->data['html'] = file_get_html($parserURL);
        			$rule = $this->data['html']->find($parserRule);
        			if($rule == NULL)
        			{
        				$this->data['html'] -> clear();
        				unset($this->data['html']);
        				echo json_encode(array('status' => 'not_ok' , 'message' => 'Wrong Rule!'));
        			}
        			else
        			{
        				//save object of parsing to db
                    	//$id_parser = $this->content_model->saveOP($parserURL, $parserRule);
                    	$id_parser = 6;

                    	//save product of parsing to db
                        //$id_product = $this->content_model->save_product_OP($parserProductType, $parserCategory);
                        $id_product = 10;

        				foreach ($rule as $element) //'ul[class=book-tabl] li'
        				{
        					$count++;
        					$arr[] =  array('status' => 'ok' ,'count' =>$count, 'info' => $element->plaintext, 'idProduct' => $id_product, 'idParser' => $id_parser);
        				}

        				$this->data['html'] -> clear();
        				unset($this->data['html']);

        				echo json_encode($arr);
        			}
       	}
        else echo json_encode(array('status' => 'not_ok' , 'message' => 'Wrong URL!'));
    }

	//Machulyanskiy: processing the element OP
    function save_items_of_product()
    {
    	$parserProductName = $this->input->post('parserProductName', TRUE);
        $parserPrice = $this->input->post('parserPrice', TRUE);
        $parserSeller = $this->input->post('parserSeller', TRUE);
        $parserCount = $this->input->post('parserCount', TRUE);
        $parserType = $this->input->post('parserType', TRUE);
        $idProduct = $this->input->post('idProduct', TRUE);
        $parserMarket = $this->input->post('parserMarket', TRUE);
        $idMarket = $parserMarket;
        //echo $idMarket . '  ' . $idProduct . '  ' . $parserSeller;

        $idCity = $this->content_model->get_idMarket($parserMarket);

		$error = $this->content_model->save_items_of_product($parserProductName, $parserPrice, $parserCount, $parserType, $idProduct, $idMarket, $parserSeller);

		if($error == null) die( json_encode(array('status' => 'ok')) );
    }

	//Machulyanskiy: delete OP
	function delete_OP()
    {
        $id = $this->input->post('id', TRUE);
    	$error = $this->content_model->delete_OP($id);
        echo json_encode($error);
    }

	//Machulyanskiy: get list OP
    function get_OP()
    {
    	$error = $this->content_model->get_OP();
		//print_r ($error);
		//prin($error);
		//if($error !== NULL) echo json_encode($error);
    	echo json_encode($error);
    }

	//Machulyanskiy: get list of elements OP
    function get_elements_OP()
    {
    	$id = $this->input->post('id', TRUE);
    	$error = $this->content_model->get_elements_OP($id);
    	//print_r ($error);
    	foreach ($error as $client_info)
			$arr[] =  array('id' => $client_info['idProduct'], 'name' => $client_info['nameProduct'], 'price' => $client_info['priceProduct']);

    	echo json_encode($arr);
    }
}
