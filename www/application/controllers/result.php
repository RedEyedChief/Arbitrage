<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Order_model order_model
 * @property CI_Input input
 * @property User_model user_model
 */
class Result extends CI_Controller
{
    private $data;

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'order_model', 'data_model  '));
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

        $ajax = $this->input->post("ajax");
        $this->blocsBefore($ajax);
        $this->load->view('orders/result',$this->data);

        $this->blocksAfter($ajax);
    }

    function result_ok($id)
    {
        echo 'pisechka';
        $this->isLogged = $this->user_model->check_logged();

        $ajax = $this->input->post("ajax");
        $this->blocsBefore($ajax);
        $num = $this->data_model->get_num_markets();
        $data['num_city'] = $num[0]->num;
        $data['markets'] = $this->data_model->get_markets();
        $data['products'] = $this->data_model->get_products();
            $this->load->view('general/map', $data);
            $this->load->view('admin/splitters/end_row');
            $this->load->view('admin/admin_footer');

                    $this->blocksAfter($ajax);
    }
}