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

        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        else
            return false;
    }
}

