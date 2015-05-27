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
        $this->load->model(array('user_model', 'order_model'));
        $this->load->database();
        $this->load->library('session');
        $this->load->helper("cookie");
        $lang = $this->input->cookie("lang") == "" ? "ukrainian" : $this->input->cookie("lang");
        $this->lang->load($lang, $lang);

    }

    private function blocsBefore($ajax)
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

    private function blocksAfter($ajax)
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

        $this->data["area"] = $this->order_model->getArea(true);

        $ajax = $this->input->post("ajax");
        $this->blocsBefore($ajax);

        $this->load->view('orders/products_list',$this->data);

        $this->blocksAfter($ajax);
    }

    function getCities(){
        $area = $this->input->post("area");
        print json_encode($this->order_model->getCities($area, true));
    }

    function getMarkets(){
        $city = $this->input->post("city");
        print json_encode($this->order_model->getMarkets($city, true));
    }

    function getProducts(){
        $market = $this->input->post("market");
        print json_encode($this->order_model->getProducts($market, true));
    }

    function placeOrder(){
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
    }
}