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
	
	/**
	 * Вихід
	 * @return true  None
	 */
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	
	/**
	 * Додати користувача
	 * @return true  None
	 */
	function register()
	{
		$data = $this->input->post(NULL);
		$this->load->library('form_validation');
	      
		$this->form_validation->set_rules('firstname', 'Ім`я', 'trim|required|xss_clean');
		$this->form_validation->set_rules('surname', 'Прізвище', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mail', 'Нікнейм', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Пароль', 'trim|required|xss_clean');
		
		
		
		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.&nbsp; User redirected to login page
			die(validation_errors());//$this->load->view('registration_view');
		}
		else
		{
			if(!$this->user->register($data)) return false;
			//Go to private area
			$this->check_database($data['password'],$data['mail']);
			redirect('/', 'refresh');
		}
	}
	
	/**
	 * вхід
	 * @return true  None
	 */
	function signin()
	{
		$data = $this->input->post(NULL);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('mail', 'Нікнейм', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Пароль', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == false)
		{
			//Field validation failed.&nbsp; User redirected to login page
			die(validation_errors());//$this->load->view('registration_view');
		}
		else
		{
			$this->check_database($data['password'],$data['mail']);
			redirect('/', 'refresh');
		}
	}
	
	/**
	 * отримання даних користувача
	 * @param object $password пароль
	 * @param Boolean $mail емейл
	 * @return true  None
	 */
	function check_database($password,$mail=false)
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
