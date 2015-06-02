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
		$this->blocsBefore();
		$this->stat_model->insertLog("visit","dashboard");
		
		$this->load->view('admin/admin_stats');
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
	}
	
	function stats()
	{
		$this->blocsBefore();
		$this->load->view('admin/admin_stats');
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
		
		$this->stat_model->insertLog("visit","dashboard/stats");
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
		
		$this->stat_model->insertLog("visit","dashboard/users");
	}
	
	function orders()
	{
		$this->blocsBefore();
		$start = $this->input->get('start')!=''?$this->input->get('start'):0;
		$end = $this->input->get('end')!=''?$this->input->get('end'):10;
		$this->data['orders'] = $this->content_model->getOrders($start,$end);
		$this->data['async']=false;
		$this->data['num']=$this->content_model->getOrdersNum();
		$this->load->view('admin/lists/orders_list',$this->data);
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
		
		$this->stat_model->insertLog("visit","dashboard/users");
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
		
		$this->stat_model->insertLog("visit","dashboard/news");
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
		
		$this->stat_model->insertLog("visit","dashboard/products");
	}
	
	function items($idProduct=false)
	{
		$this->blocsBefore();
		$start = $this->input->get('start')!=''?$this->input->get('start'):0;
		$end = $this->input->get('end')!=''?$this->input->get('end'):10;
		$this->data['items'] = $this->content_model->getItems($start, $end, $idProduct);
		$this->data['markets'] = $this->data_model->get_markets();
		$this->data['products'] = $this->data_model->get_products();
		$this->data['async']=false;
		$this->data['num']=count($this->data['items']);
		$this->load->view('admin/lists/items_list',$this->data);
		$this->load->view('admin/splitters/end_row');
		$this->load->view('admin/admin_footer');
		
		$this->stat_model->insertLog("visit","dashboard/items");
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
		
		$this->stat_model->insertLog("visit","dashboard/cities");
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
		
		$this->stat_model->insertLog("visit","dashboard/prices");
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
		
		$this->stat_model->insertLog("algo","dashboard/test");
		
		$result = $this->dataloader->load(intval($start),intval($depth),intval($c_dist), $dis_products, $dis_markets);
			
		echo json_encode($result);
	}
	
	function request()
    	{
    		$this->blocsBefore();
		$num = $this->data_model->get_num_markets();
		$data['num_city'] = $num[0]->num;
		$data['markets'] = $this->data_model->get_markets();
		$data['products'] = $this->data_model->get_products();
    		$this->load->view('general/map', $data);
    		$this->load->view('admin/splitters/end_row');
    		$this->load->view('admin/admin_footer');
		
		$this->stat_model->insertLog("visit","dashboard/request");
    	}

	function result($id)
    	{
    		$this->blocsBefore();
		
		$this->data = $this->data_model->get_order_params($id);
		//die(print_r($this->data));
		
		$start = $this->data->id_start;
		$depth = $this->data->depth;
		$c_dist = $this->data->c_dist;
		$price = $this->data->price;
		$depth = $depth==NULL?100000:$depth;
		$dis_products = array();
		$dis_markets = array();
		$result = $this->dataloader->load(intval($start),intval($depth),intval($c_dist), $dis_products, $dis_markets);
    		$result['id'] = $id;
		
		switch(intval($price))
		{
			case 1: $this->load->view('general/map_result',$result); break;
			default: $this->load->view('general/map_result',$result); break;
			
		}
		
		$this->load->view('admin/splitters/end_row');
    		$this->load->view('admin/admin_footer');
		
		$this->stat_model->insertLog("algo","dashboard/test");
    	}

	
	function parsing()
    {
	$this->stat_model->insertLog("visit","dashboard/parsing");
	
    	$this->blocsBefore();
    	//$data['parsers'] = $this->content_model->get_OP();
		$data['markets'] = $this->data_model->get_markets();
    	$this->load->view('admin/parsing_view', $data);
    	$this->load->view('admin/splitters/end_row');
    	$this->load->view('admin/admin_footer');
    }

	//Machulyanskiy: logic of check URL by cURL
	function checkURLExists($url){
        if(empty($url))	return false;

        $ch = curl_init($url);

		try{
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			curl_close($ch);
			if($http_code>=200 && $http_code<300)	return true;
			return false;
		}catch(Exception $e)
        {
        	echo $e->getMessage();
        }
    }

	//Machulyanskiy: processing the request to the source
    function parsing_request()
    {
		$parserURL = $this->input->post('parserURL', TRUE);
		$parserRule = $this->input->post('parserRule', TRUE);
		$parserProductType = $this->input->post('parserProductType', TRUE);
		$parserCategory = $this->input->post('parserCategory', TRUE);

		try
		{
			//проверяем существование ссылки курлом
			$check_url = $this->checkURLExists($parserURL);
			if($check_url == 1)
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
										//save product of parsing to db
										$id_product = $this->content_model->save_product_OP($parserProductType, $parserCategory);
										//$id_product = 10; //просто тестовые данные

										//save object of parsing to db
										$id_parser = $this->content_model->saveOP($parserURL, $parserRule, $id_product);
										//$id_parser = 6; //просто тестовые данные

										foreach ($rule as $element) //'ul[class=book-tabl] li'
										{
											$count++;
											$arr[] =  array('status' => 'ok' ,'count' =>$count, 'info' => $element->plaintext,
											'idProduct' => $id_product, 'idParser' => $id_parser);
										}

										$this->data['html'] -> clear();
										unset($this->data['html']);;
										echo json_encode($arr);
									}
						}
						else echo json_encode(array('status' => 'not_ok' , 'message' => 'Wrong URL!'));
		}catch(Exception $e)
			{
				echo $e->getMessage();
			}
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
        $idMarket = $this->content_model->get_idMarket_by_name($parserMarket);

		try{
		$error = $this->content_model->save_items_of_product($parserProductName, $parserPrice, $parserCount, $parserType, $idProduct, $idMarket, $parserSeller);
        if($error == null)
        	echo json_encode(array('status' => 'ok', 'message' => 'Success saving!'));
        else
            echo json_encode(array('status' => 'not_ok', 'message' => $error));
        }catch(Exception $e)
        			{
        				echo $e->getMessage();
        			}
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

    	echo json_encode($error);
    }
	//Machulyanskiy: get list of elements OP
    function get_elements_OP()
    {
    	$id = $this->input->post('id', TRUE);
    	$error = $this->content_model->get_elements_OP($id);

    	foreach ($error as $client_info)
			$arr[] =  array('idItem'=>$client_info['idItem'], 'nameItem' => $client_info['nameItem'], 'priceItem' => $client_info['priceItem'], 'typeItem' => $client_info['typeItem'], 'countItem' => $client_info['countItem'], 'sellerItem' => $client_info['sellerItem']);

    	echo json_encode($arr);
    }
    function update_items_OP()
    {
    	$id = $this->input->post('id', TRUE);
		$name = $this->input->post('name', TRUE);
        $price = $this->input->post('price', TRUE);
        $count = $this->input->post('count', TRUE);
        $type = $this->input->post('type', TRUE);
        $seller = $this->input->post('seller', TRUE);

        try{
        $error = $this->content_model->update_items_OP($id, $name, $price, $count, $type, $seller);
        if($error == null)
        	echo json_encode(array('status' => 'ok', 'message' => 'Success update!'));
        else
            echo json_encode(array('status' => 'not_ok', 'message' => $error));
        }catch(Exception $e)
        			{
        				echo $e->getMessage();
        			}
    }

    function item_OP_delete()
    {
        $id = $this->input->post('id', TRUE);

        try{
    	$error = $this->content_model->item_OP_delete($id);
        if($error == null)
        	echo json_encode(array('status' => 'ok', 'message' => 'Success delete!'));
        else
            echo json_encode(array('status' => 'not_ok', 'message' => $error));
        }catch(Exception $e)
        			{
        				echo $e->getMessage();
        			}
    }

}
