<?php

/**
 * @property CI_DB_active_record db
 */
Class Order_model extends CI_Model
{
   
        public function getCity($add_empty=false)
    {
        //$query = $this->db->get("market",array("nameCity"));
        $this->db->select('DISTINCT(nameCity) as nameCity')->from('market');  
        $query=$this->db->get(); 
        $result = array();

       

        foreach ($query->result() as $row)
        {
            //$city['idMarket'] = $row->idMarket;
            $city['nameCity'] = $row->nameCity;
            $result[] = $city;
        }
        return $result;
    }
    public function getMarkets($city, $add_empty=false)
    {
        $query = $this->db->get_where("market",array("nameCity"=>$city));

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
        $str = serialize($products);
        $order_info = array(      
            'Profile_idProfile' => $user_id,
            'Date' => date("Y-m-d H:i:s"),
            'id_start_market' =>$start,
            'products'=>$str);
        $this->db->insert("orders",$order_info);
        $order_id = $this->db->insert_id();


        if($this->db->_error_number() == 0)
        {
            return true;
        }
        else
            return false;
        ;
    }
}

