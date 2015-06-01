<?php

Class User_model extends CI_Model
{
    /**
     * ���� �����������
     * @param var $mail ����� �����������
     * @param var $password ������ �����������
     * @return true  None
     */
    function login($mail, $password)
    {
        $query = $this->db->query("SELECT * FROM profile
                                      LEFT JOIN profile_details ON profile.idProfile = profile_details.profile_idProfile
                                      WHERE mail='" . $mail . "' AND password=MD5('" . $password . "')
                                      LIMIT 1");

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * �������� �������������� �����������
     * @return var  true, ���� �������������
     */
    function check_logged()
    {
        return ($this->session->userdata('logged_in')) ? TRUE : FALSE;
    }

    /**
     * ������� ���������� � �������
     * @param var $id ID �����������
     * @return var  ��� �������
     */
    function getProfileInfo($id)
    {
        $query = $this->db->query("SELECT * FROM profile
                                      LEFT JOIN profile_details ON profile.idProfile = profile_details.profile_idProfile
                                      WHERE idProfile='" . $id . "'
                                      LIMIT 1");

        if ($query->num_rows() == 1) {
            return $query->result();//toDataArray($query->result());
        } else {
            return false;
        }
    }

    /**
     * �������� ������ �����������
     * @param var $data ��� �����������
     * @return true  None
     */
    function register($data)
    {
        $sql = "INSERT INTO profile (firstName, surName, password, mail, role )
                VALUES ('" . $data['firstname'] . "' , '" . $data['surname'] . "', MD5('" . $data['password'] . "'), '" . $data['mail'] . "', " . $data['role'] . ") ";

        $this->db->query($sql);
        $a=$this->db->affected_rows();
        if ($a == 1)
        {
             $id = $this->db->insert_id();

            $this->db->query("INSERT INTO profile_details (Profile_idProfile)
                VALUES ('".$id."' )");
            return $id;
        }
        else
            return false;
       

    }
    function email_exists($mail){
        $sql="SELECT firstName,mail FROM profile WHERE mail='{$mail}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        return($result->num_rows()===1 && $row->mail) ? $row->firstName :false;
    }
    function verify_reset_password_code($mail,$code)
    {
         $sql="SELECT firstName,mail FROM profile WHERE mail='{$mail}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if($result->num_rows()===1)
        {
            return($code==md5($this->config->item('salt').$row->firstName)) ? true:false;
        } else{
            return false;
        } 
    }
    function update_password(){
        $mail=$this->input->post('mail');
        $password = MD5($this->config->item('salt').$this->input->post('password'));
          $sql="UPDATE profile SET password = '{$password}' WHERE mail='{$mail}' LIMIT 1";
       $this->db->query($sql);

        if($this->db->affected_rows()==1)
        {
            return true;
        } else{
            return false;
        } 
    }
    }


