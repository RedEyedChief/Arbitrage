<?php
Class User_model extends CI_Model
{
    /**
     * Вхід користувача
     * @param var $mail емейл користувача
     * @param var $password пароль користувача
     * @return true  None
     */
    function login($mail, $password)
    {
        $query = $this -> db -> query("SELECT * FROM profile
                                      LEFT JOIN profile_details ON profile.idProfile = profile_details.profile_idProfile
                                      WHERE mail='".$mail."' AND password=MD5('".$password."')
                                      LIMIT 1");
        
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Перевіряє авторизованість користувача
     * @return var  true, якщо авторизований
     */
    function check_logged()
    {
        return ($this->session->userdata('logged_in'))?TRUE:FALSE;
    }
    
    /**
     * Повертає інформацію з профіля
     * @param var $id ID користувача
     * @return var  дані профілю
     */
    function getProfileInfo($id)
    {
        $query = $this -> db -> query("SELECT * FROM profile
                                      LEFT JOIN profile_details ON profile.idProfile = profile_details.profile_idProfile
                                      WHERE idProfile='".$id."'
                                      LIMIT 1");
      
        if($query -> num_rows() == 1)
        {
            return $query->result();//toDataArray($query->result());
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Створити нового користувача
     * @param var $data дані користувача
     * @return true  None
     */
    function register($data)
    {
        $query = $this->db->query("
                                  INSERT INTO profile (FIRSTNAME, SURNAME, PASSWORD, MAIL, ROLE )VALUES ('
                                  ".$data['firstname']."','".$data['surname']."',MD5('".$data['password']."'),'".$data['mail']."',".$data['role'].")
                                  ");
        if($this->db->affected_rows()==1) return $this->db->insert_id();
        else return false;
    }
}

