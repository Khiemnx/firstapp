<?php
class Users extends CI_Controller {

	public function __construct()
    {
        parent::__construct();	

        // This line will load user model to this controller
        $this->load->model('users_model');
		$this->load->helper('url');
    }

	public function loadView($data, $path) 
	{
		$this->load->view('header', $data); 
		$this->load->view($path, $data);
		$this->load->view('footer');
	}

    public function index()
    {
        // Use method get_users of user model to get users list
        $data["users"] = $this->users_model->get_users();
		$data["page_title"] = "List of users";

        $this->loadView($data, "users/index");
    }
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$data["page_title"] = "Create New User";
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		$this->form_validation->set_rules('email', 'Email', array('required','valid_email'));
		$this->form_validation->set_rules('phone_number', 'Phone number', 'required');

		if ($this->form_validation->run() === TRUE) {
			$this->users_model->create_user();
			redirect(base_url('/'));
		} else {
			$this->loadView($data, "users/create");
		}
	}

	public function update($user_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data["user"] = $this->users_model->get_user($user_id);

		$data["page_title"] = "Update User";
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		$this->form_validation->set_rules('email', 'Email', array('required','valid_email'));
		$this->form_validation->set_rules('phone_number', 'Phone number', 'required');
		if ($this->form_validation->run() === TRUE) {
			$this->users_model->update_user($user_id);
			redirect(base_url('/'));
		} else {
			$this->loadView($data, "users/update");
		}
	}

	public function delete($user_id)
	{
		$this->users_model->delete_user($user_id);
		redirect(base_url('/'));
	}

	public function view($user_id) {
		$data["user"] = $this->users_model->get_user($user_id);
		$data["page_title"] = "View User";

		$this->loadView($data, "users/view");
	}

	public function deleteMulti() {
		$data = $this->input->post('data');
		$data = substr($data, 1, -1); //remove first and last character from string ('[' and ']')
		$usersIDS = explode(",", $data);
		foreach ($usersIDS as $usersID) {
			$usersID =  substr($usersID, 1, -1); //remove first and last character from string (' "" ' and ' "" ')
			$this->users_model->delete_user($usersID);
		}
	}
}
