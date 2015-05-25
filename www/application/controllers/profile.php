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
        $this->data["user_info"] = $this->loadUserDetails($user_id);
        $this->data["orders"] = $this->loadUserOrders($user_id);
        $this->data["areas"] = $this->loadUserExtra($user_id);
        $this->data["price"] = $this->profile_model->getPrice($user_id,true);
        $this->data["area"] = $this->profile_model->getArea(true);
        $this->data["user_price"] = $this->loadUserPrice($user_id);;
        $ajax = $this->input->post("ajax");
        $this->blocsBefore($ajax);

        $this->load->view('profile/personal',$this->data);

        $this->blocksAfter($ajax);
    }

    function loadUserDetails($user_id){
        $query = $this->db->get_where("profile",array("idProfile"=>$user_id), 1);
        return $query->result_array();
    }
    function loadUserExtra($user_id){
        $query = $this->db->get_where("profile_details",array("Profile_idProfile"=>$user_id), 1);
        return $query->result_array();
    }
    function loadUserPrice($user_id){
        $sql = "select namePrice
                from price p
                right join profile f on p.idPrice = f.id_price
                where f.idProfile = ".intval($user_id)." ";

        $query = $this->db->query($sql);
        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }
    function loadUserOrders($user_id){
        $sql = "select DATE_FORMAT(o.date,'%d/%m/%Y %H:%s') as date, group_concat(d.id_product) as products
                from orders o
                inner join orders_details d on d.id_order = o.idOrder
                where o.Profile_idProfile = ".intval($user_id)." 
                group by o.idOrder";

        $query = $this->db->query($sql);

        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }

        return $result;
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