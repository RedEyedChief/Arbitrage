<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property CI_Input input
 * @property User_model user_model
 */
class Profile extends CI_Controller
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

         $user_profile = $this->session->userdata("profile");                                                                                                                                                                                   
      $user_id = $user_profile["idProfile"];

        $this->data["user_info"] = $this->loadUserDetails($user_id);
        $this->data["orders"] = $this->loadUserOrders($user_id);

        $ajax = $this->input->post("ajax");
        $this->blocsBefore($ajax);

        $this->load->view('profile/personal',$this->data);

        $this->blocksAfter($ajax);
    }

    function loadUserDetails($user_id){
        $query = $this->db->get_where("profile",array("idProfile"=>$user_id), 1);
        return $query->result_array();
    }

    function loadUserOrders($user_id){
        $sql = "select DATE_FORMAT(o.date,'%d/%m/%Y') as date, p.nameProduct, quantity, price
                from orders o
                inner join product p on p.idProduct = o.Product_idProduct
                where o.Profile_idProfile = ".intval($user_id);

        $query = $this->db->query($sql);

        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }

        return $result;
    }

    function saveUserData($user_id=0){
        if ($user_id==0){
 $user_profile = $this->session->userdata("profile");                                                                                                                                                                                   
      $user_id = $user_profile["idProfile"];
        }

        $data = $this->input->post();

        $sql = "UPDATE profile SET
                firstName = '".$data['firstName']."' ,
                surName = '".$data['surName']."',
                password = MD5('".$data['password']."'),
                mail = '".$data['email']."',
                telephone = '".$data['telephone']."'
                WHERE idProfile = '$user_id';";

        $this->db->query($sql);

        $this->index();
    }
}