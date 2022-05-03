<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Usuario extends MY_Controller {
	
	function __construct() {
		parent:: __construct();

		$this->load->database();
		$this->load->model("empresa_model");
		$this->load->model("usuarios_model");
	}

	##################################################################################################################
	# PERMISOS
	##################################################################################################################
	private function access_all() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "jefatura") == "all") {
			return true;
		}
	}
	/*private function access_supervisor() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "supervisor") == "yes") {
			return true;
		}
	}
	private function access_jefatura() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "colaborador") == "yes") {
			return true;
		}
	}
	private function access_cliente() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "cliente") == "yes") {
			return true;
		}
	}*/
	

	##################################################################################################################
	##################################################################################################################
	
	function verificaacceso() {
		if ( $this->access_all() /*|| $this->access_supervisor() || $this->access_jefatura() || $this->access_cliente() */) {			
			return true;
		}
	}

	public function index() {
		if($this->verificaacceso() == true){
			$data['classInicio']="";
		    $data['classCliente']="";
		    $data['classReporte']="";
		    $data['classMttoEmpresa']="";
		    $data['classMttoUsuario']="active";
		    $data['classMttoActividad']="";
			$data['tdocs'] = $this->empresa_model->config_system_option(6); //OBTENER LISTA DE TIPO DE DOCUMENTOS
			$data['usuarios'] = $this->usuarios_model->allusuario();
			$this->template->render("mantenimiento/usuario/list", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}
	}	

	public function add_usuario(){ 
		$this->form_validation->set_rules('txtDocumento','Ingrese Documento', 'required|is_unique[ex_empleados.emp_numdoc]'); 

		if($this->form_validation->run() == FALSE){
			echo 'Error! Los datos del empleado, ya se encuentan registrados.';
		}else{
			if($qid = $this->usuarios_model->add_usuario()){
				//echo 'si_'.$qid;
				//$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$qid;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function usu_permiso($id = 0) {
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_final= $explora[2];
		} else {
			return false;
		}

		if($this->verificaacceso() == true){
			$data['classInicio']="";
		    $data['classCliente']="";
		    $data['classReporte']="";
		    $data['classMttoEmpresa']="";
		    $data['classMttoUsuario']="active";
		    $data['classMttoActividad']="";
			$data['empresas'] = $this->empresa_model->empresas();
			$data['sucursales'] = $this->empresa_model->sucursal_all();
			$data['user'] = $this->usuarios_model->usuario_id($id_final);
			$this->template->render("mantenimiento/usuario/rol", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}
	}

	public function proceso_permiso_custom(){
		$this->form_validation->set_rules('perid','Solicitante', 'required');	

		if($this->form_validation->run() == FALSE) {
			echo 'Uno o varios campos son obligatorios.';
		} else {
			if($qid = $this->usuarios_model->personal_permisos_custom()){
				echo 'si_'.$qid;
			}else{
				echo 'Error en el registro. Comunicate con el administrador.';
			}
		}
	}

	public function edit($id = 0) {
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_final= $explora[2];
		} else {
			return false;
		}

		if($this->verificaacceso() == true){
			$data['classInicio']="";
		    $data['classCliente']="";
		    $data['classReporte']="";
		    $data['classMttoEmpresa']="";
		    $data['classMttoUsuario']="active";
		    $data['classMttoActividad']="";
			$data['empresas'] = $this->empresa_model->empresas();
			//$data['sedes'] = $this->empresa_model->sede();
			$data['user'] = $this->usuarios_model->usuario_id($id_final);
			$this->template->render("mantenimiento/usuario/edit", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}
	}

	public function edit_usuario(){
		$this->form_validation->set_rules('perid','Solicitante', 'required');	

		if($this->form_validation->run() == FALSE) {
			echo 'Uno o varios campos son obligatorios.';
		} else {
			if($qid = $this->usuarios_model->edit_usuario()){
				echo 'si_'.$qid;
			}else{
				echo 'Error en el registro. Comunicate con el administrador.';
			}
		}
	}
}