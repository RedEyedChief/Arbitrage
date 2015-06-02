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
        $this->load->model(array('user_model', 'order_model','profile_model'));
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
        $this->data["user_info"] = $this->profile_model->loadUserDetails($user_id);
        $this->data["orders"] = $this->profile_model->loadUserOrders($user_id);
        $this->data["areas"] = $this->profile_model->loadUserExtra($user_id);
        $this->data["price"] = $this->profile_model->getPrice($user_id,true);
        $this->data["area"] = $this->profile_model->getArea(true);
        $this->data["user_price"] = $this->profile_model->loadUserPrice($user_id);
        $this->data["order_price"] = $this->profile_model->loadOrderPrice($user_id);
        $this->data["user_market"] = $this->profile_model->loadUserMarket($user_id);
        $ajax = $this->input->post("ajax");
        $this->blocsBefore($ajax);

        $this->load->view('profile/personal',$this->data);

        $this->blocksAfter($ajax);
    }

   
    /*function loadPrices(){
        $price = $this->input->post("price");
        print json_encode($this->profile_model->getPrices($price, true));
    }
     */
 function getCities(){
        $area = $this->input->post("area");
        print json_encode($this->profile_model->getCities($area, true));
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
        if($data['price']!= -1)
        {
                $sql = "UPDATE profile SET
                id_price = '".$data['price']."'
                WHERE idProfile = '$user_id';";

                $this->db->query($sql);
        }
        $sql = "UPDATE profile_details SET
                cityProfile = '".$data['city']."',
                areaProfile = '".$data['area']."'
                WHERE Profile_idProfile = '$user_id';";

        $this->db->query($sql);

        $this->index();
    }
}