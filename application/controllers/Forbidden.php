<?php

class Forbidden extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	##################################################################################################################
	# PERMISOS
	##################################################################################################################
	private function req_all() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "requerimiento_all") == "all") {
			return true;
		}
	}
	private function req_alm_logistica() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "requerimiento_logistica") == "yes") {
			return true;
		}
	}
	private function req_alm_compras() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "requerimiento_almcompras") == "yes") {
			return true;
		}
	}
	private function req_alm() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "requerimiento_alm") == "yes") {
			return true;
		}
	}
	private function req_compras() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "requerimiento_compras") == "yes") {
			return true;
		}
	}
	private function req_user() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "requerimiento_user") == "yes") {
			return true;
		}
	}

	private function adq_admin() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "adq_admin") == "yes") {
			return true;
		}
	}
	private function adq_alm_compras() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "adq_almcompras") == "yes") {
			return true;
		}
	}
	private function adq_alm() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "adq_alm") == "yes") {
			return true;
		}
	}
	private function adq_compras() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "adq_compras") == "yes") {
			return true;
		}
	}

	##################################################################################################################
	##################################################################################################################

	function verifica_acceso_requerimiento() {
		if ( $this->req_all() || $this->req_alm_logistica() || $this->req_alm_compras() || $this->req_alm() || $this->req_compras() || $this->req_user() ) {
			#redirect("forbidden");
			redirect("requerimiento");
		}
	}

	##################################################################################################################
	##################################################################################################################

	function index() {

		if($this->verifica_acceso_requerimiento()){

		} else {
			$view_data["heading_nro"] = "403";
			$view_data["heading_msg"] = "ACCESO DENEGADO";
			$view_data["message"] = "No tienes permiso para acceder a este módulo.";
			/*if ($this->input->is_ajax_request()) {
				$view_data["no_css"] = true;
			}*/
			$this->template->render("errors/html/error_general", $view_data);
		}

		
	}

}