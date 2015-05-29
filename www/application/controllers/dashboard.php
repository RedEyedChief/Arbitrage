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
    	//$data['parsers'] = $this->content_model->get_OP();
		$data['markets'] = $this->data_model->get_markets();
    	$this->load->view('admin/parsing_view', $data);
    	$this->load->view('admin/splitters/end_row');
    	$this->load->view('admin/admin_footer');
    }

	function checkURLExists($url){
        if(empty($url))	return false;

        $ch = curl_init($url);
        //$ch = 47;

        //echo $ch . '</br>' . curl_init($url) . '	</br>	' . $url . '	';

        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //echo $ch . '</br>' . CURLINFO_HTTP_CODE . '	</br>	' . $http_code . '	';

        curl_close($ch);
        if($http_code>=200 && $http_code<300)	return true;
        return false;
    }

	//Machulyanskiy: processing the request to the source
    function parsing_request()
    {
		$parserURL = $this->input->post('parserURL', TRUE);
		$parserRule = $this->input->post('parserRule', TRUE);
		$parserProductType = $this->input->post('parserProductType', TRUE);
		$parserCategory = $this->input->post('parserCategory', TRUE);

		$check_url = $this->checkURLExists($parserURL);
		if($check_url == 1)
		/*$headers = @get_headers($parserURL);
		if($headers[0] == 'HTTP/1.1 200 OK')*/
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
                                    //$id_product = $this->content_model->save_product_OP($parserProductType, $parserCategory);
                                    $id_product = 10;

                    				//save object of parsing to db
                                	//$id_parser = $this->content_model->saveOP($parserURL, $parserRule, $id_product);
                                	$id_parser = 6;

                    				foreach ($rule as $element) //'ul[class=book-tabl] li'
                    				{
                    					$count++;
                    					//$text = str_replace(" ", '&nbsp', $element->plaintext);
                    					$arr[] =  array('status' => 'ok' ,'count' =>$count, 'info' => $element->plaintext,
                    					'idProduct' => $id_product, 'idParser' => $id_parser);
                    				}

                    				$this->data['html'] -> clear();
                    				unset($this->data['html']);
									//echo '  got here and suck  ';
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
        //$idMarket = $this->content_model->get_idMarket_by_name($parserMarket);

		//$error = $this->content_model->save_items_of_product($parserProductName, $parserPrice, $parserCount, $parserType, $idProduct, $idMarket, $parserSeller);
        if($error == null)
        	echo json_encode(array('status' => 'ok', 'message' => 'Success saving!'));
        else
            echo json_encode(array('status' => 'not_ok', 'message' => $error));
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
        $error = $this->content_model->update_items_OP($id, $name, $price, $count, $type, $seller);
        if($error == null)
        	echo json_encode(array('status' => 'ok', 'message' => 'Success update!'));
        else
            echo json_encode(array('status' => 'not_ok', 'message' => $error));
    }
    function item_OP_delete()
    {
        $id = $this->input->post('id', TRUE);
    	$error = $this->content_model->item_OP_delete($id);
        if($error == null)
        	echo json_encode(array('status' => 'ok', 'message' => 'Success delete!'));
        else
            echo json_encode(array('status' => 'not_ok', 'message' => $error));
    }
}
