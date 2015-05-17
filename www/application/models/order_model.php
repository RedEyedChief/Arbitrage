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
        $query = $this->db->get_where("product", array("Market_idMarket" => $market_id));

        $result = array();

        foreach ($query->result() as $row) {
            $result[] = array($row->idProduct, $row->nameProduct, $row->countProduct, $row->priceProduct);
        }

        return $result;
    }

    public function placeOrder($order)
    {
        if ($order["quantity"] <= 0)
            return false;

        $query = $this->db->get_where("product", array("idProduct"=>$order["product"]),1);
        $price = $query->result_array()[0]["priceProduct"]*$order["quantity"];

        $data = array(
            'Profile_idProfile' => $order["user"],
            'Product_idProduct' => $order["product"],
            'Quantity' => $order["quantity"],
            'Price' => $price,
            'Date' => date("Y-m-d H:i:s")
        );

        $this->db->insert('orders', $data);

        return $this->db->insert_id();
    }
}

