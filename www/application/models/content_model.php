<?php
Class Content_model extends CI_Model
{
    /**
     * Отримати всі новини з start до end, чи з id
     * @param Number $start нижня межа, з
     * @param Number $end верхня межа, по
     * @param Boolean $id ID новини
     * @return var  масив новин
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
     * Отримати всі товари з start до end, чи з id
     * @param Number $start нижня межа, з
     * @param Number $end верхня межа, по
     * @param Boolean $id ID товару
     * @return var  масив товарів
     */
    function getProducts($start=0,$end=10,$id=false)
    {
        $where = $id!=false?"WHERE product.idProduct=".$id:"";
        $query = $this -> db -> query("SELECT * FROM product INNER JOIN market ON Market_idMarket = idMarket ".$where." ORDER BY idProduct DESC LIMIT ".$start.",".$end);
        
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
     * Отримати всі міста з start до end, чи з id
     * @param Number $start нижня межа, з
     * @param Number $end верхня межа, по
     * @param Boolean $id ID міста
     * @return var  масив міст
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
     * Отримати всі тарифи з start до end, чи з id
     * @param Number $start нижня межа, з
     * @param Number $end верхня межа, по
     * @param Boolean $id ID тарифу
     * @return var  масив тарифів
     */
    function getPrices($start=0,$end=10,$id=false)
    {
        $where = $id!=false?"WHERE price.idPrice=".$id:"";
        $query = $this -> db -> query("SELECT * FROM price INNER JOIN area ON idPrice = price_idPrice ".$where." ORDER BY idArea DESC LIMIT ".$start.",".$end);
        
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
     * Отримати опитування
     * @param Number $start нижня межа, з
     * @param Number $end верхня межа, по
     * @param Boolean $id ID опитування
     * @return var  масив новин
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
     * Отримати всі коменти з start до end, чи з id
     * @param Number $start нижня межа, з
     * @param Number $end верхня межа, по
     * @param Boolean $id ID новини
     * @return var  масив коментів
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
     * Додати комент
     * @param object $id ID новни
     * @param object $text Текст комента
     * @param object $user Автор комента
     * @param object $uid ID автора
     * @return true  None
     */
    function addComment($id, $text, $user, $uid)
    {
        $query = $this->db->insert("COMMENT",array("textComment"=>$text, "userComment"=>$user, "article_idArticle"=>$id, "profile_idProfile"=>$uid));
    }
    
    /**
     * Отримати всіх користуваяів з start до end
     * @param Number $start нижня межа, з
     * @param Number $end верхня межа, по
     * @return var  масив користувачів
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
     * Отримати новину, можливо застаріла
     * @param object $id ID новини
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
        $this->db->delete("product");
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
     * Повертає інформацію з профіля
     * @param var $id ID користувача
     * @return var  дані профілю
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
                                    idProduct,nameProduct,priceProduct,countProduct,categoryProduct 
                                    FROM product
                                    WHERE idProduct='".$id."'
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
        $query = $this->db->get_where('product INNER JOIN market ON Market_idMarket = idMarket', array('idProduct' => $this->db->insert_id()));
        if($query -> num_rows() == 1)return $query->result();//toDataArray($query->result());
        else return false;
    }
}
