<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('content_model','user_model','data_model'));
		$this->load->helper('url','cookie');
		$this->load->database();
		$this->load->library("session","dataloader");
		$this->isLogged = $this->user_model->check_logged();
		if($this->isLogged>=3) $this->data['profile'] = $this->session->userdata("profile");
		else $this->isLogged = 0;
		$lang = $this->input->cookie("lang")==""?"ukrainian":$this->input->cookie("lang");
		$this->lang->load($lang,$lang);
		$this->data="";
	}
	
        public function getPlaces()
        {
            if($this->isLogged>=3) echo json_encode($this->data_model->get_markets());
        }
	
	public function removeMarker($id)
	{
		if($this->isLogged>=3)
		{
			$this->data_model->remove_market($id);
		}
	}
        
        public function savePlaces()
        {
            if($this->isLogged>=3)
            {
                $new_markers = json_decode($this->input->post('new_markers'));
                $id=array();
                foreach($new_markers as $marker)
                {
                    if($marker==null) continue;
                    $rid = $marker->id;
                    unset($marker->id);
                    $id[$rid] = $this->data_model->add_market($marker);
                }
                
                $markers = json_decode($this->input->post('markers'));
                
                //print_r($markers);
                
                foreach($markers as $marker)
                {
                    if($marker==null) continue;//?"null":"not");
                    //if(!isset($marker)) continue;//print_r($markers[1]);
                    $this->data_model->update_markets($marker);
                }
                
                echo json_encode($id);
            }
            else echo array();
        }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */