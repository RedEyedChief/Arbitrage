<?php
Class Content_model extends CI_Model
{
    /**
     * ???????? ?? ?????? ? start ?? end, ?? ? id
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @param Boolean $id ID ??????
     * @return var  ????? ?????
     */
    function getNews($start=0,$end=10,$id=false)
    {
        $where = $id!=false?"WHERE profile.idProfile=".$id:"";
        $query = $this -> db -> query("SELECT idArticle,headerArticle, descriptionArticle, textArticle, mail, dateArticle FROM article INNER JOIN profile ON Profile_idProfile = idProfile ".$where." ORDER BY dateArticle DESC LIMIT ".$start.",".$end);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    function getNewsNum()
    {
        $query = $this -> db -> query("SELECT count(idArticle) AS num FROM article");
        return $query->result();
    }
    
    /**
     * ???????? ?? ?????? ? start ?? end, ?? ? id
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @param Boolean $id ID ??????
     * @return var  ????? ??????
     */
    function getItems($start=0,$end=10,$idProduct=false)
    {
        if($idProduct!=false) $this->db->where('item.product_idProduct',$idProduct);
        $this->db->limit($end,$start);
        $this->db->select('*');
        $this -> db -> from('item');
        $this -> db -> join('market','market_idMarket=idMarket','left');
        $this -> db -> join('product','product_idProduct=idProduct','left');
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
    
    function getItem($id)
    {
        $this->db->select('*');
        $this -> db -> from('item');
        $this -> db -> where('idItem',$id);
        $this -> db -> join('market','market_idMarket=idMarket','left');
        $this -> db -> join('product','product_idProduct=idProduct','left');
        $query = $this->db->get();
        
        if($query -> num_rows() > 0) return $query->result();
        else return false;
    }
    
    /**
     * ???????? ?? ?????? ? start ?? end, ?? ? id
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @param Boolean $id ID ??????
     * @return var  ????? ??????
     */
    function getProducts($start=0,$end=10,$id=false)
    {
        $where = $id!=false?"WHERE product.idProduct=".$id:"";
        $query = $this -> db -> query("SELECT * FROM product ".$where." ORDER BY idProduct DESC LIMIT ".$start.",".$end);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    function getProductsNum()
    {
        $query = $this -> db -> query("SELECT count(idProduct) AS num FROM product");
        return $query->result();
    }
    
    /**
     * ???????? ?? ???? ? start ?? end, ?? ? id
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @param Boolean $id ID ????
     * @return var  ????? ???
     */
    function getCities($start=0,$end=10,$id=false)
    {
        $where = $id!=false?"WHERE city.idCity=".$id:"";
        $query = $this -> db -> query("SELECT * FROM city INNER JOIN area ON Area_idArea = idArea ".$where." ORDER BY idCity DESC LIMIT ".$start.",".$end);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    function getCitiesNum()
    {
        $query = $this -> db -> query("SELECT count(idCity) AS num FROM city");
        return $query->result();
    }
    
    /**
     * ???????? ?? ?????? ? start ?? end, ?? ? id
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @param Boolean $id ID ??????
     * @return var  ????? ???????
     */
    function getPrices($start=0,$end=10,$id=false)
    {
        $where = $id!=false?"WHERE price.idPrice=".$id:"";
        $query = $this -> db -> query("SELECT namePrice AS name, costPrice AS cost FROM price ".$where." ORDER BY idPrice ASC LIMIT ".$start.",".$end);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    function getPricesNum()
    {
        $query = $this -> db -> query("SELECT count(idPrice) AS num FROM price");
        return $query->result();
    }
    
    /**
     * ???????? ??????????
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @param Boolean $id ID ??????????
     * @return var  ????? ?????
     */
    function getPolls($start=0,$end=10,$id=false)
    {
        $where = $id!=false?"WHERE profile.idProfile=".$id:"";
        $query = $this -> db -> query("SELECT idPoll,namePoll,statePoll,mail FROM poll INNER JOIN profile ON Profile_idProfile = idProfile ".$where." LIMIT ".$start.",".$end);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    /**
     * ???????? ?? ??????? ? start ?? end, ?? ? id
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @param Boolean $id ID ??????
     * @return var  ????? ???????
     */
    function getComments($id, $start=0,$end=10)
    {
        $where = $id!=false?"WHERE article_idArticle=".$id:"";
        $query = $this -> db -> query("SELECT textComment as comment,dateComment as date,userComment as mail FROM COMMENT ".$where);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    /**
     * ?????? ??????
     * @param object $id ID ?????
     * @param object $text ????? ???????
     * @param object $user ????? ???????
     * @param object $uid ID ??????
     * @return true  None
     */
    function addComment($id, $text, $user, $uid)
    {
        $query = $this->db->insert("COMMENT",array("textComment"=>$text, "userComment"=>$user, "article_idArticle"=>$id, "profile_idProfile"=>$uid));
    }
    
    /**
     * ???????? ??? ???????????? ? start ?? end
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @return var  ????? ????????????
     */
    function getUsers($start=0,$end=10,$order="profile.isActive DESC, profile.role DESC")
    {
        $query = $this -> db -> query("SELECT * FROM profile LEFT JOIN profile_details ON profile.idProfile = profile_details.profile_idProfile"." ORDER BY ".$order." LIMIT ".$start.",".$end);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    function getUsersNum()
    {
        $query = $this -> db -> query("SELECT count(idProfile) AS num FROM profile");
        return $query->result();
    }
    
    /**
     * ???????? ??? ???????????? ? start ?? end
     * @param Number $start ????? ????, ?
     * @param Number $end ?????? ????, ??
     * @return var  ????? ????????????
     */
    function getOrders($start=0,$end=10,$order="idOrder DESC")
    {
        $query = $this -> db -> query("SELECT idOrder AS id, id_start_market AS id_start, nameMarket AS start_market, mail, products, depth, c_dist, orders.id_price AS price
                                      FROM orders LEFT JOIN profile ON idProfile = profile_idProfile LEFT JOIN market ON idMarket = id_start_market"." ORDER BY ".$order." LIMIT ".$start.",".$end);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    function getOrdersNum()
    {
        $query = $this -> db -> query("SELECT count(idOrder) AS num FROM orders");
        return $query->result();
    }
    
    /**
     * ???????? ??????, ??????? ????????
     * @param object $id ID ??????
     * @return true  None
     */
    function getArticle($id)
    {
        $where = $id!=false?"WHERE article.idArticle=".$id:"";
        $query = $this -> db -> query("SELECT idArticle,headerArticle, descriptionArticle, textArticle, mail, dateArticle, imageArticle FROM article INNER JOIN profile ON Profile_idProfile = idProfile ".$where);
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    function writeArticle($title, $description, $text, $id)
    {
        $query = $this->db->insert("article",array("headerArticle"=>$title, "descriptionArticle"=>$description, "textArticle"=>$text, "profile_idProfile"=>$id));
    }
    
    function removeArticle($id)
    {
        $this->db->where('idArticle',$id);
        $this->db->delete("article");
    }
    
    function removeProduct($id)
    {
        $this->db->where('idProduct',$id);
        $this->db->delete('product');
    }
    
    function removeItem($id)
    {
        $this->db->where('idItem',$id);
        $this->db->delete("item");
    }
    
    function removeUser($id)
    {
        $data = array(
               'isActive' => 0
            );
        $this->db->where('idProfile',$id);
        $this->db->update('profile',$data);
        //$this->db->delete("profile");
    }
    
    function removePrice($id)
    {
        $data = array(
               'isActivePrice' => 0
            );
        $this->db->where('idPrice',$id);
        $this->db->update('price',$data);
        //$this->db->delete("profile");
    }
    
    function removeCity($id)
    {
        $data = array(
               'isActiveCity' => 0
            );
        $this->db->where('idCity',$id);
        $this->db->update('city',$data);
        //$this->db->delete("profile");
    }
    
    function votePoll($id,$vote)
    {
        $query = $this->db->query("
                                  UPDATE pollVOTE SET countPollVote = countPollVote + 1 WHERE Poll_idPoll=".$id." AND numberPollVote=".$vote."
                                  ");
    }
    
    function getPoll($id)
    {
        $query = $this->db->query("
                                    SELECT  idPoll, namePoll, userPoll, statePoll, numberPollVote, textPollVote, countPollVote
                                    FROM  site.poll 
                                    INNER JOIN site.pollvote ON poll.idPoll = pollvote.Poll_idPoll WHERE idPoll = ".$id."
                                  ");
        if($query -> num_rows() > 0){ return $query->result();}
        else return false;
    }
    
    function getRandomPoll()
    {
        $query = $this->db->query("SELECT idPoll FROM poll ORDER BY RAND() LIMIT 1
                                  ");
        $query = $query->result();
        $id = $query[0]->idPoll;
        $query = $this->db->query("
                                    SELECT  idPoll, namePoll, userPoll, statePoll, numberPollVote, textPollVote, countPollVote
                                    FROM  site.poll 
                                    INNER JOIN site.pollvote ON poll.idPoll = pollvote.Poll_idPoll WHERE idPoll = ".$id."
                                  ");
        if($query -> num_rows() > 0){ return $query->result();}
        else return false;
    }
    
    function addPoll($name, $votes, $id)
    {
        $this->db->trans_start();
        $this->db->insert('poll',array('namePoll'=>$name,'profile_idProfile'=>$id));
        $insert_id = $this->db->insert_id();
        foreach($votes as $key=>$vote)
        {
            $this->db->insert('pollVOTE',array('poll_idPoll'=>$insert_id,'textPollVote'=>$vote,'numberPollVote'=>$key+1));
        }
        $this->db->trans_complete();
    }
    
    /**
     * ������� ���������� � �������
     * @param var $id ID �����������
     * @return var  ��� �������
     */
    function getUserFields($id)
    {
        $query = $this -> db -> query("SELECT
                                    idProfile,firstName,surName,lastName,role,mail  
                                    FROM profile
                                    WHERE idProfile='".$id."'
                                    LIMIT 1");
      
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
    
    function getProductFields($id)
    {
        $query = $this -> db -> query("SELECT
                                    idProduct,nameProduct,categoryProduct
                                    FROM product
                                    WHERE idProduct='".$id."'
                                    LIMIT 1");
      
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
    
    function getItemFields($id)
    {
        $query = $this -> db -> query("SELECT
                                    idItem,product_idProduct,market_idMarket,priceItem 
                                    FROM item
                                    WHERE idItem='".$id."'
                                    LIMIT 1");
      
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
    
    function getPriceFields($id)
    {
        $query = $this -> db -> query("SELECT
                                    idPrice,namePrice,costPrice
                                    FROM price
                                    WHERE idPrice='".$id."'
                                    LIMIT 1");
      
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
    
    function getCityFields($id)
    {
        $query = $this -> db -> query("SELECT
                                    idCity,nameCity
                                    FROM city
                                    WHERE idCity='".$id."'
                                    LIMIT 1");
      
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
    
    function addProduct($data)
    {
        $this->db->insert('product',$data);
        $query = $this->db->get_where('product', array('idProduct' => $this->db->insert_id()));
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
    
    function addItem($data)
    {
        $this->db->insert('item',$data);
        $this->db->where('item.idItem',$this->db->insert_id());
        $this->db->select('*');
        $this -> db -> from('item');
        $this -> db -> join('market','market_idMarket=idMarket','left');
        $this -> db -> join('product','product_idProduct=idProduct','left');
        $query = $this->db->get();
        
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
    
    function updateUser($data)
    {
        $this->db->where('idProfile', $data['idProfile']);
        $this->db->update('profile', $data);
    }
    
    function updateItem($data)
    {
        $this->db->where('idItem', $data['idItem']);
        $this->db->update('item', $data);
    }
    
    function updateProduct($data)
    {
        $this->db->where('idProduct', $data['idProduct']);
        $this->db->update('product', $data);
    }
    
    function updatePrice($data,$id)
    {
        $this->db->where('idPrice', $id);
        $this->db->update('price', $data);
    }
    
    //Machulyanskiy: insert object of parsing
     function saveOP ($parserURL, $parserRule, $id_product)
     {
        $this->db->where('adressParser',$parserURL);
        $this->db->where('rurlesParser',$parserRule);
        $query = $this->db->get('parser');
        if ($query->num_rows == 1)
           foreach ($query->result_array() as $row)
               return $row['idParser'];
        else
        {
           $this->db->insert("parser",array( "rurlesParser"=>$parserRule,"adressParser"=>$parserURL, "Report_idReport"=>0, "Product_idProduct"=>$id_product, 'Market_idMarket'=>32));
           return $this->db->insert_id();
        }

     }
     //Machulyanskiy: insert product of OP with check on exist
     function save_product_OP($parserProductType, $parserCategory)
     {
        $this->db->where('nameProduct',$parserProductType);
        $this->db->where('categoryProduct',$parserCategory);
        $query = $this->db->get('product');
        if ($query->num_rows == 1)
            foreach ($query->result_array() as $row)
                return $row['idProduct'];
        else
        {
            $this->db->insert("product",array( "nameProduct"=>$parserProductType, "categoryProduct"=>$parserCategory, "Report_idReport"=>0, "isActiveProduct"=>1));
            return $this->db->insert_id();
        }
     }
     //Machulyanskiy: insert items of product
     function save_items_of_product($parserProductName, $parserPrice, $parserCount, $parserType, $idProduct, $idMarket, $parserSeller)
     {
        $query = $this->db->insert("item",array( "nameItem"=>$parserProductName,"priceItem"=>$parserPrice, "typeItem"=>$parserType,
                                                "isActiveItem"=>1, "countItem"=>$parserCount, "Market_idMarket"=>$idMarket, "product_idProduct"=>$idProduct, 'sellerItem' => $parserSeller));
        return $this->db->_error_message();
     }
     function get_OP()
     {
        $query = $this->db->query("SELECT
                                         p.idParser,
                                         p.rurlesParser,
                                         p.adressParser,
                                         pr.nameProduct,
                                         pr.categoryProduct
                                     FROM parser p
                                     INNER JOIN product pr
                                        ON p.Product_idProduct = pr.idProduct");
		if($query -> num_rows() !== 0)return $query->result();//toDataArray($query->result());
        else return false;
     }
     function delete_OP($id)
     {
        $this->db->where('idParser',$id);
        $this->db->delete("parser");
     }
     function get_elements_OP($id)
     {
     	//$query = $this->db->query("select * from parser  order by chain_alias");
     	/*$this->db->where('Market_idMarket',$id);
     	$query = $this->db->get('item');
     	return $query->result_array();*/
     		//return $this->_get_as_array($sql);
     	$query = $this->db->query("SELECT
     	                                i.idItem,
                                        i.nameItem,
                                        i.priceItem,
                                        i.typeItem,
                                        i.countItem,
                                        i.sellerItem
                                    FROM parser p
                                    JOIN item i
                                      ON p.Product_idProduct = i.product_idProduct
                                    WHERE p.idParser = '".$id."'");
     	return $query->result_array();
     }
     function get_idMarket_by_name($parserMarket)
     {
        $this->db->where('nameMarket',$parserMarket);
        $query = $this->db->get('market');
        if ($query->num_rows !== 0)
            foreach ($query->result_array() as $row)
                return $row['idMarket'];
     }
     function get_Markets()
     {
        $query = $this->db->get('market');
        return $query->result_array();
     }
     function update_items_OP($id, $name, $price, $count, $type, $seller)
     {
        $data = array(
                       'nameItem' => $name,
                       'priceItem' => $price,
                       'typeItem' => $type,
                       'countItem' => $count,
                       'sellerItem' => $seller
                    );
        $this->db->where('idItem', $id);
        $this->db->update('item', $data);
        return $this->db->_error_message();
     }
     function item_OP_delete($id)
     {
        $this->db->where('idItem',$id);
        $this->db->delete("item");
        return $this->db->_error_message();
     }
}
