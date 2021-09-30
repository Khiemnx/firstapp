<?php
class Users_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
		
    }

	public function get_users()
	{
    	$query = $this->db->get('users');
    	return $query->result_array();
	}

	public function create_user()
	{
		$this->load->helper('url');

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email')
		);

		return $this->db->insert('users', $data);
	}


}
