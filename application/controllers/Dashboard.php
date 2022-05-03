<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct() {
		parent:: __construct();

		$this->load->database();
	}


	##################################################################################################################
	# PERMISOS
	##################################################################################################################
	private function access_all() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "exlog_menu") == "yes") {
			return true;
			//echo 'Hola;'
		}
	}

	##################################################################################################################
	##################################################################################################################
	
	
	function verificaacceso() {
		if ( $this->access_all() /*|| $this->access_supervisor() || $this->access_jefatura() || $this->access_cliente() */) {			
			return true;
		}
	}

	public function index() {
		#echo "hola";
		#$view_data['ola'] = "oli";
		$data['classInicio']="";
	    $data['classCliente']="";
	    $data['classReporte']="active";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
		if($this->verificaacceso() == true){
			redirect("welcome");
		} else {
			$this->template->render("mantenimiento/proximamente/view", $data);
		}
		#$this->template->render("dashboard/index");
		#redirect("Welcome");
	}
}