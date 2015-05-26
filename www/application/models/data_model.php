<?php
Class Data_model extends CI_Model
{
    public function get_num_markets()
    {
        $this -> db -> select("COUNT(idMarket) AS num");
        $query = $this -> db -> get('market');
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function get_num_products($active = true)
    {
        if ($active) $this->db->where('isActiveProduct',1);
        $this -> db -> select("COUNT(idProduct) AS num");
        $query = $this -> db -> get('product');
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    //public function get_markets()
    //{
    //    $query = $this -> db -> query("SELECT idMarket AS id, latMarket AS lat, lngMarket AS lng, nameMarket AS name FROM market");
    //    
    //    if($query -> num_rows() > 0)
    //    {
    //        return $query->result();
    //    }
    //    else
    //    {
    //        return false;
    //    }
    //}
    
    public function update_markets($data)
    {
        $this->db->where('idMarket', $data->idMarket);
        $this->db->update('market', $data);
    }
    
    public function add_market($data)
    {
        $data->city_idCity=0;
        $this->db->insert('market',$data);
        return $this->db->insert_id();
    }
    
    //public function get_products($idMarket=-1, $type=-1)
    //{
    //    $where = $idMarket!=-1?"WHERE Market_idMarket=".$idMarket:"";
    //    if($idMarket!=-1 || $type!=-1) $where.=" AND "; elseif ($type!=-1) $where.="WHERE ";
    //    $where .= $type!=-1?"typeItem=".$type:"";
    //    
    //    //die("SELECT idProduct AS id, typeProduct AS type, priceProduct, categoryProduct FROM product INNER JOIN item ON idProduct = product_idProduct ".$where);
    //    $query = $this -> db -> query("SELECT idProduct AS id, nameProduct AS name FROM product ".$where);
    //    if($query -> num_rows() > 0)
    //    {
    //        return $query->result();
    //    }
    //    else
    //    {
    //        return false;
    //    }
    //}
    
    public function get_products($idMarket=-1, $type=-1, $ignore=array())
    {
        if(!empty($ignore)) $this->db->where_not_in('idProduct', $ignore);
        if ($idMarket!=-1) $this->db->where('Market_idMarket',$idMarket);
        if ($type!=-1) $this->db->where('typeItem',$type);
        $this->db->select('idProduct AS id, nameProduct AS name');
        $query = $this->db->get('product');
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function get_markets($ignore=array(), $active=true)
    {
        if(!empty($ignore)) $this->db->where_not_in('idMarket', $ignore);
        if ($active) $this->db->where('isActiveMarket',1);
        $this->db->select('idMarket AS id, latMarket AS lat, lngMarket AS lng, nameMarket AS name');
        $query = $this->db->get('market');
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function get_items($idMarket=-1, $type=-1, $ignore=array(), $active=true)
    {
        if(!empty($ignore)) $this->db->where_not_in('idItem', $ignore);
        if ($idMarket!=-1) $this->db->where('Market_idMarket',$idMarket);
        if ($type!=-1) $this->db->where('typeItem',$type);
        if ($active) $this->db->where('isActiveItem',1);
        $this->db->select('idProduct AS id, typeItem AS type, priceItem AS price, nameProduct AS name, categoryProduct');
        $this->db->from('product');
        $this->db->join('item', 'idProduct = product_idProduct','right');
        $query = $this->db->get();
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}
