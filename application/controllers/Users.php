<?php
	class Users extends CI_Controller{

		// Register user
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Usersname', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else{
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				//set messege
				$this->session->set_flashdata('user_reistered', 'You are now registered and can log in');

				redirect('posts');
			}
		}

		//Login user
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Usersname', 'required');
			
			$this->form_validation->set_rules('password', 'Password', 'required');
			

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else{
				//get username
				$username = $this->input->post('username');
				//get and encrypt password
				$password = md5($this->input->post('password'));
				
				// Login user
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					//set messege
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('posts');
				} else{
					//set messege
					$this->session->set_flashdata('login_failed', 'Login id invalid');

					redirect('users/login');
				}
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('user_id');

			//set messege
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}

		//check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose another one');

			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		//check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose another one');

			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}