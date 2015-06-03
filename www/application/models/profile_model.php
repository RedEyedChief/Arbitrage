<?php

Class Profile_model extends CI_Model
{

     function getPrice($id,$add_empty=false)
    {

       /* $id_price_person = $this->db->query("SELECT id_price FROM profile
                                      WHERE idProfile='" . $id . "'
                                      LIMIT 1");
         foreach ($id_price_person->result() as $row)
        {
            $res_id['idPrice'] = $row->id_price;
            $result_id[] = $res_id;
        }
         $price_person = $this->db->query("SELECT idPrice, namePrice FROM price
            INNER JOIN profile ON price.idPrice = profile.id_price
                                      WHERE idPrice='" . $res_id['idPrice'] . "'
                                      LIMIT 1");*/
     $query = $this->db->get("price");
        $result = array();
        if ($add_empty){
       $result[] = array("idPrice"=>"-1",
                              "namePrice" => "Please make choice");
        }
        foreach ($query->result() as $row)
        {
            $price['idPrice'] = $row->idPrice;
            $price['namePrice'] = $row->namePrice;
            $result[] = $price;
        }

        return $result;
    }
    function getArea($add_empty=false)
    {
        $query = $this->db->get("area");

        $result = array();

        if ($add_empty){
            $result[] = array("idArea"=>"-1",
                              "nameArea" => "Please make choice");
        }

        foreach ($query->result() as $row)
        {
            $area['idArea'] = $row->idArea;
            $area['nameArea'] = $row->nameArea;
            $result[] = $area;
        }

        return $result;
    }

    public function getCities($area_id, $add_empty=false)
    {
        $query = $this->db->get_where("city",array("Area_idArea"=>$area_id));

        $result = array();

        if ($add_empty){
            $result[] = array("idCity"=>"-1",
                "nameCity" => "Please make choice");
        }

        foreach ($query->result() as $row)
        {
            $area['idCity'] = $row->idCity;
            $area['nameCity'] = $row->nameCity;
            $result[] = $area;
        }

        return $result;
    }
function getMarket($market_id,$add_empty=false)
    {
        $query = $this->db->get("market",array("idMarket"=>$market_id));

        $result = array();

        foreach ($query->result() as $row)
        {
            $market['idArea'] = $row->idMArket;
            $market['nameMarket'] = $row->nameMarket;
            $result[] = $market;
        }

        return $result;
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
        $sql = "select idPrice,namePrice
                from price p
                right join profile f on p.idPrice = f.id_price
                where f.idProfile = ".intval($user_id)." ";

        $query = $this->db->query($sql);
        $result = array();
        foreach ($query->result() as $row) {
             $price['idPrice'] = $row->idPrice;
            $price['namePrice'] = $row->namePrice;
            $result[] = $price;
        }
        return $result;
    }
    function loadOrderPrice($user_id){
        $sql = "select idPrice,namePrice
                from price p
                right join orders f on p.idPrice = f.id_price
                where f.Profile_idProfile = ".intval($user_id)." ";

        $query = $this->db->query($sql);
        $result = array();
        foreach ($query->result() as $row) {
           $price['idPrice'] = $row->idPrice;
            $price['namePrice'] = $row->namePrice;
            $result[] = $price;
        }
        return $result;
    }
     function loadUserMarket($user_id){
        $sql = "select nameMarket
                from orders o
                right join market f on o.id_start_market = f.idMarket
                where o.Profile_idProfile = ".intval($user_id)." ";

        $query = $this->db->query($sql);
        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row;
        }
        return $result;
    }
    function loadUserOrders($user_id){
        $sql = "select idOrder,DATE_FORMAT(o.date,'%d/%m/%Y %H:%s') as date, products
                from orders o
                where o.Profile_idProfile = ".intval($user_id)." 
                group by o.idOrder";

        $query = $this->db->query($sql);

        $result = array();
        foreach ($query->result_array() as $row)
        {
            $result[] = $row; 
        }

        return $result;
    }

}