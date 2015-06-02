<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Order_model order_model
 * @property CI_Input input
 * @property User_model user_model
 */
class Orders extends CI_Controller
{
    private $data;

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'order_model','data_model'));
        $this->load->database();
        $this->load->library(array('session','Dataloader'));
        $this->load->helper(array("cookie"));
        $lang = $this->input->cookie("lang") == "" ? "ukrainian" : $this->input->cookie("lang");
        $this->lang->load($lang, $lang);

    }

    private function blocsBefore($ajax=false)
    {
        if (!$ajax) {
            if ($this->isLogged) {
                $this->data['profile'] = $this->session->userdata("profile");
                $this->load->view('site/site_header', $this->data['profile']);
            } else {
                $this->load->view('site/site_header');
            }
        }
    }

    private function blocksAfter($ajax=false)
    {
        if ($this->isLogged) {
            $this->load->helper('form');
        }
        if (!$ajax) {
            $this->load->view('site/site_footer');
        }
    }

    function index()
    {
        $this->isLogged = $this->user_model->check_logged();

        $this->data["city"] = $this->order_model->getCity(true);

        $ajax = $this->input->post("ajax");
        $this->blocsBefore($ajax);

        $this->load->view('orders/products_list',$this->data);

        $this->blocksAfter($ajax);
    }
    function getMarkets(){
        try {
        $city = $this->input->post("city");
        print json_encode($this->order_model->getMarkets($city, true));
        } catch (Exception $e) {
        echo $e->getMEssage();
        }
    }

    function getProducts(){
        try {
        $market = $this->input->post("market");
        print json_encode($this->order_model->getProducts($market, true));
        } catch (Exception $e) {
        echo $e->getMEssage();
        }
    }

    function placeOrder(){
        try {
        $data = $this->input->post();

        $user_profile = $this->session->userdata("profile");                                                                                                                                                                                   
        $user_id = $user_profile["idProfile"];
        $products = $data["products"];
        $start = $data["market"];
        if ($this->order_model->placeOrder($user_id, $products,$start)){
            print json_encode(array("result"=>true));
        } else {
            print json_encode(array("result"=>false, "error"=>"Cant place new order!"));
        }
        
        } catch (Exception $e) {
        echo $e->getMEssage();
        }
    }
    
    function result($id)
    {
        $this->isLogged = $this->user_model->check_logged();
        
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
        
        $this->blocksAfter();
    }
}