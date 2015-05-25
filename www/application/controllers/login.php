<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->model('user_model','user',TRUE);
		$this->load->library("session");
	}
	
	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
	      
		$this->form_validation->set_rules('mail', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	      
		if($this->form_validation->run() == false)
		{
			$this->load->view('login_view');
		}
		else
		{
			redirect('/', 'refresh');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}

    function register($ajax = 'false')
    {
        $data = $this->input->post(NULL);
        if (!isset($data['role']))
            $data['role'] = 0;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mail', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('role', 'Role', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            print json_encode(validation_errors("<li>","</li>"));
        } else {
            $id = $this->user->register($data);

            if ($id) {
                // Login user if registration was successful
                if ($this->check_database($data['password'], $data['mail']))
                    print json_encode("");
            }
            else {
                print json_encode("<li>Cannot register new user. </li>");
            }

            //Go to private area
//            if ($ajax != 'true') {
//                $this->check_database($data['password'], $data['mail']);
//                redirect('/', 'refresh');
//            } else {
//                $this->data['users'] = $this->user->getProfileInfo($id);
//                $this->data['async'] = true;
//                $this->load->view('admin/lists/users_list', $this->data);
//            }
            //
        }
    }
	
	function signin()
	{
		$data = $this->input->post(NULL);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('mail', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if($this->form_validation->run() == false)
		{
            print json_encode(validation_errors("<li>","</li>"));
			//die(validation_errors());//$this->load->view('registration_view');
		}
		else
		{
			if ($this->check_database($data['password'],$data['mail'])) {
                print json_encode("");
            }
            else {
                print json_encode("<li>Incorrect user or password</li>");
            }
		}
	}

    function check_database($password,$mail)
	{
		//Field validation succeeded.&nbsp; Validate against database
		if(!$mail) $mail = $this->input->post('mail');
	      
		//query the database
		$result = $this->user->login($mail, $password);

		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->idProfile,
					'mail' => $row->mail
				);
				$this->session->set_userdata('logged_in', $sess_array);
				
				$data = $this->user->getProfileInfo($row->idProfile);
				$data = get_object_vars($data[0]);
				
				$this->session->set_userdata('profile', $data);
				
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid mail or password');
			return false;
		}
	}
}
