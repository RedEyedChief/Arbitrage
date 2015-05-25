<?php

/**
 * @property CI_DB_active_record db
 */
Class Order_model extends CI_Model
{
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

    public function getMarkets($city_id, $add_empty=false)
    {
        $query = $this->db->get_where("market",array("City_idCity"=>$city_id));

        $result = array();

        if ($add_empty){
            $result[] = array("idMarket"=>"-1",
                "nameMarket" => "Please make choice");
        }

        foreach ($query->result() as $row)
        {
            $area['idMarket'] = $row->idMarket;
            $area['nameMarket'] = $row->nameMarket;
            $result[] = $area;
        }

        return $result;
    }

    public function getProducts($market_id)
    {
        $this->db->select('DISTINCT(nameProduct) as nameProduct')->from('product');  
        $query=$this->db->get(); 

        $result = array();

        foreach ($query->result() as $row) {
            $result[] = array("nameProduct"=>$row->nameProduct);
            }

        return $result;
    }

    public function placeOrder($user_id,$products,$start)
    {
        if (empty($products))
            return false;

        $order_info = array(      
            'Profile_idProfile' => $user_id,
            'Date' => date("Y-m-d H:i:s"),
            'start' =>$start);
        $this->db->insert("orders",$order_info);
        $order_id = $this->db->insert_id();

        foreach ($products as $key => $value)
        {

            $order_details = array(
                'id_order' => $order_id,
                'id_product' => $value
            );

            $this->db->insert('orders_details', $order_details);
                
        }


        if($this->db->_error_number() == 0)
        {
            return true;
        }
        else
            return false;
        ;
    }
}

