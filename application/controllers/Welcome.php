<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('user/login');
		$this->load->view('template/footer');
	}

	public function register()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{	
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('user/login');
                }
                else
                {
					$data = array(
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password')
					);
					
					$this->user_model->registerUser($data);
					$this->session->set_flashdata('success', 'Your account has been registered');

					redirect(base_url('welcome/index'));
                }
				
	    }
	}
	

	public function login()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE)
                {
					$data = array(
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password')
					);

					$status = $this->User_model->checkPassword($password);
					if($status!=false)
					{
						$email = $status->email;
						$password = $status->password;

						$session_data = array(
							'email' => $email,
							'password' => $password,
						);

						$this->session->set_userdata('UserLoginSession', $session_data);

					}
					else
					{
						$this->session->set_flashdata('error','Password is wrong');

						redirect(base_url('welcome/login'));

					}
                }
				else
				{
					$this->session->set_flashdata('error','Fill all the required fields');

					redirect(base_url('welcome/login'));
				}
		}
		

		$this->load->view('user/login',$data);
	}
	 
	


	

	

}
