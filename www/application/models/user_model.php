<?php
Class User_model extends CI_Model
{
    function login($username, $password)
    {
        $query = $this -> db -> query("SELECT * FROM SITE.PROFILE
                                      LEFT JOIN SITE.PROFILE_DETAILS ON profile.idProfile = profile_details.profile_idProfile
                                      WHERE username='".$username."' AND password=MD5('".$password."')
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
    
    function check_logged()
    {
        return ($this->session->userdata('logged_in'))?TRUE:FALSE;
    }
    
    function getProfileInfo($id)
    {
        $query = $this -> db -> query("SELECT * FROM SITE.PROFILE
                                      LEFT JOIN SITE.PROFILE_DETAILS ON profile.idProfile = profile_details.profile_idProfile
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
    
    function register($data)
    {
        $query = $this->db->query("
                                  INSERT INTO SITE.PROFILE (FIRSTNAME, SURNAME, RATING, PASSWORD, USERNAME )VALUES ('
                                  ".$data['firstname']."','".$data['surname']."','0',MD5('".$data['password']."'),'".$data['username']."')
                                  ");
    }
}

