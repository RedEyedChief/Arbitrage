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
                "nameMarket" => "Оберіть, будь ласка");
        }

        foreach ($query->result() as $row)
        {
            $area['idMarket'] = $row->idMarket;
            $area['nameMarket'] = $row->nameMarket;
            $result[] = $area;
        }

        return $result;
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
        $sql = "select id_price
                from profile
                where profile.idProfile = ".intval($user_id)." ";

        $query = $this->db->query($sql); 
        $price = $query->result();
        $order_info = array(      
            'Profile_idProfile' => $user_id,
            'Date' => date("Y-m-d H:i:s"),
            'id_start_market' =>$start,
            'products'=>$str,
            'id_price'=>$price[0]->id_price);
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

