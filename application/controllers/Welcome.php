<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	private $ncompleto = null;

	function __construct(){
		parent:: __construct();

		$this->load->database();
	/*	$this->load->model("documentos_model");
		$this->load->model("almacenes_model");
		$this->load->model("empresas_model");
		$this->load->model("productos_model");

		$this->load->model("entradas_model");
		$this->load->model("centrocostos_model");
		$this->load->model("tipomoneda_model");
		$this->load->model("custom/customrol_model", "customrol");*/

		$this->ncompleto = $this->login_user->PER_NOMBRE.' '.$this->login_user->PER_APELLIDO;
	}

	function index() {
		$data['classInicio']="active";
	    $data['classCliente']="";
	    $data['classReporte']="";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
		#$this->template->render("test");
		$this->template->render("welcome_message", $data);
	}
}
