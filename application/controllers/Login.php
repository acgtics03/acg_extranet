<?php

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->helper('email');

		#$this->load->database();
		$this->load->model("usuarios_model");
		$this->load->library('form_validation');
	}

	function index() {
		if ($this->usuarios_model->login_user_id()) {
			redirect('dashboard/');
		} else {
			$view_data["redirect"] = "";
			if (isset($_REQUEST["redirect"])) {
				$view_data["redirect"] = $_REQUEST["redirect"];
			}
			$this->form_validation->set_rules('txtndoc', '', 'callback_authenticate');
			$this->form_validation->set_error_delimiters('<span>', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('layout/login/index', $view_data);
			} else {
				if ($view_data["redirect"]) {
					redirect($view_data["redirect"]);
				} else {
					redirect('dashboard/');
					#redirect('dashboard/view');
				}
			}
		}
	}

	#comprobar autenticación
	function authenticate($txtndoc) {

		//No verifique la contraseña si hay algún error
		if (validation_errors()) {
			$this->form_validation->set_message('authenticate', "");
			return false;
		}

		$password = $this->input->post("password");
		if (!$this->usuarios_model->authenticate($txtndoc, $password)) {
			$this->form_validation->set_message('authenticate', lang("authentication_failed"));
			return false;
		}
		return true;
	}

	function salir() {
		$this->usuarios_model->sign_out();
	}

}