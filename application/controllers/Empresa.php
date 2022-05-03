<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Empresa extends MY_Controller {
	
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

	public function index() { // MUESTRA LISTADO PRINCIPAL
		if($this->verificaacceso() == true){
			$data['classInicio']="";
		    $data['classCliente']="";
		    $data['classReporte']="";
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['empresas'] = $this->empresa_model->empresas();
			$this->template->render("mantenimiento/empresas/list", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}
	}

	public function add() { // FORMULARIO PARA AGREGAR NUEVA EMPRESA GRANDE
		if($this->verificaacceso() == true){
			$data['classInicio']="";
		    $data['classCliente']="";
		    $data['classReporte']="";
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['tclientes'] = $this->empresa_model->config_system_option(1); //OBTENER LISTA DE TIPO DE CLIENTES
			$data['tEstCliente'] = $this->empresa_model->config_system_option(2); // OBTIENE LOS ESTADOS ACTIVOS O INACTIVOS DE LOS CLIENTES
			$data['tRepositorio'] = $this->empresa_model->config_system_option(3); // OBTIENES LOS TIPOS DE REPOSITORIOS
			$data['tReportes'] = $this->empresa_model->get_reportes(); // OBTIENES LOS TIPOS DE REPORTES
			$data['contadores'] = $this->usuarios_model->config_usuarios(4); // OBTIENES CONTADORES
			$data['supervisores'] = $this->usuarios_model->config_usuarios(2); // OBTIENES SUPERVISOR
			$this->template->render("mantenimiento/empresas/add", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}
	}

	public function add_empresa(){ // METODO PARA AGREGAR LA NUEVA EMPRESA
		$this->form_validation->set_rules('txtDocumento','Ingrese RUC', 'is_unique[ex_empresa.EX_EMP_RUC]'); 

		if($this->form_validation->run() == FALSE){
			echo 'La empresa ya se encuentra registrada.';
		}else{
			if($qid = $this->empresa_model->add_empresa()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN"); //CODIFICACION A BASE 64
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function edit($id = 0) { //FORMULARIO PARA EDITAR LA EMPRESA GRANDE
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
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['usuarios'] = $this->usuarios_model->allusuario();
			$data['emp'] = $this->empresa_model->empresa_id($id_final);
			$data['tclientes'] = $this->empresa_model->config_system_option(1); //OBTENER LISTA DE TIPO DE CLIENTES
			$data['tEstCliente'] = $this->empresa_model->config_system_option(2); // OBTIENE LOS ESTADOS ACTIVOS O INACTIVOS DE LOS CLIENTES
			$data['tRepositorio'] = $this->empresa_model->config_system_option(3); // OBTIENES LOS TIPOS DE REPOSITORIOS
			$data['tReportes'] = $this->empresa_model->get_reportes(); // OBTIENES LOS TIPOS DE REPORTES
			$data['contadores'] = $this->usuarios_model->config_usuarios(4); // OBTIENES CONTADORES
			$data['supervisores'] = $this->usuarios_model->config_usuarios(2); // OBTIENES SUPERVISOR
			$this->template->render("mantenimiento/empresas/edit", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}
	}

	public function upd_empresa(){ // METODO PARA ACTUALIZAR LA EMPRESA GRANDE
		$this->form_validation->set_rules('txtIdEmpresa','Id empresa', 'required'); 

		if($this->form_validation->run() == FALSE){
			echo '<div class="alert error" style="color:red"> Error en el Formulario </div>';
		}else{
			if($qid = $this->empresa_model->upd_empresa()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function gestion_overview($id = 0){ // VISTA GENERAL DE LA EMPRESA POR ID
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
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['id'] 		= base64_encode("+_23_".$id_final."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
			$data['emp'] 		= $this->empresa_model->empresa_id($id_final);
			$data['years'] 		= $this->empresa_model->all_years($id_final);
			$data['sucursales']	= $this->empresa_model->all_sucursal_id($id_final);
			$this->template->render("mantenimiento/empresas/gest_overview", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}		
	}

	public function add_sucursal($id = 0){
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
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['id'] = base64_encode("+_23_".$id_final."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
			$data['emp'] = $this->empresa_model->empresa_id($id_final);
			$data['tclientes'] = $this->empresa_model->config_system_option(1); //OBTENER LISTA DE TIPO DE CLIENTES
			$data['tEstCliente'] = $this->empresa_model->config_system_option(2); // OBTIENE LOS ESTADOS ACTIVOS O INACTIVOS DE LOS CLIENTES
			$data['tRepositorio'] = $this->empresa_model->config_system_option(3); // OBTIENES LOS TIPOS DE REPOSITORIOS
			$this->template->render("mantenimiento/empresas/add_sucursal", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}		
	}

	public function add_anio(){ 
		$this->form_validation->set_rules('mtxtAddAnio','Ingrese Año a crear', 'required'); 

		if($this->form_validation->run() == FALSE){
			echo 'El año ya esta registrado, verifique.';
		}else{
			if($qid = $this->empresa_model->add_anio()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function view_month($id = 0){ // VISTA GENERAL DE LA EMPRESA POR ID
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_anio= $explora[2];
			$id_empresa= $explora[3];
		} else {
			return false;
		}

		if($this->verificaacceso() == true){
			$data['classInicio']		= "";
		    $data['classCliente']		= "";
		    $data['classReporte']		= "";
		    $data['classMttoEmpresa']	= "active";
		    $data['classMttoUsuario']	= "";
		    $data['classMttoActividad']	= "";
			$data['idanio']     		= $id_anio;
			$data['id'] 				= base64_encode("+_23_".$id_anio."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
			$data['emp'] 				= $this->empresa_model->empresa_id($id_empresa);
			$data['anio']				= $this->empresa_model->anio_id($id_anio);
			$data['meses'] 				= $this->empresa_model->all_month($id_anio);
			$this->template->render("mantenimiento/empresas/view_month", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}		
	}

	public function add_mes(){  //AGREGAR NOMBRE DEL MES
		$this->form_validation->set_rules('mtxtAddMes','Ingrese mes a crear', 'required'); 

		if($this->form_validation->run() == FALSE){
			echo 'El nombre ya se encuentra registrado.';
		}else{
			if($qid = $this->empresa_model->add_mes()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function mUpdAnio(){  //ACTUALIZAR DATOS DE UN AÑO
		$this->form_validation->set_rules('mtxtUpdNomAnio','Ingrese mes a crear', 'required'); 

		if($this->form_validation->run() == FALSE){
			echo 'El nombre ya se encuentra registrado.';
		}else{
			if($qid = $this->empresa_model->mUpdAnio()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function mUpdMes(){  //ACTUALIZAR DATOS DE UN MES
		$this->form_validation->set_rules('mtxtUpdNomMes','Ingrese nombre a cambiar', 'required'); 

		if($this->form_validation->run() == FALSE){
			echo 'Ingrese los datos solicitados.';
		}else{
			if($qid = $this->empresa_model->mUpdMes()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function view_file($id = 0){ // VISTA GENERAL DE ARCHIVOS POR AÑO DE UNA EMPRESA
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_mes= $explora[2];
			$id_anio= $explora[3];
			$id_empresa= $explora[4];
		} else {
			return false;
		}

		if($this->verificaacceso() == true){
			$data['classInicio']="";
		    $data['classCliente']="";
		    $data['classReporte']="";
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['idmes']  = $id_mes;
			$data['id'] 	= base64_encode("+_23_".$id_anio."_".$id_empresa."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
			$data['emp'] 	= $this->empresa_model->empresa_id($id_empresa);
			$data['anio']	= $this->empresa_model->anio_id($id_anio);
			$data['files'] 	= $this->empresa_model->all_files_id($id_mes);
			$data['mes']	= $this->empresa_model->mes_id($id_mes);
			$this->template->render("mantenimiento/empresas/view_file", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}		
	}

	public function add_file(){  //AGREGAR NOMBRE DEL MES
		$this->form_validation->set_rules('mtxtAddFile','Ingrese nombre de archivo a crear', 'required'); 

		if($this->form_validation->run() == FALSE){
			echo 'El nombre ya se encuentra registrado.';
		}else{
			if($qid = $this->empresa_model->add_file()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function upd_file(){  //ACTUALIZAR INFO DE CARPETAS DE ARCHIVOS
		$this->form_validation->set_rules('mtxtUpdNomFile','Ingrese nombre a actualizar', 'required'); 

		if($this->form_validation->run() == FALSE){
			echo 'El nombre ya se encuentra registrado.';
		}else{
			if($qid = $this->empresa_model->upd_file()){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$qid."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
		}
	}

	public function view_empresa_sucursal($id = 0){ // VISTA GENERAL DE LA EMPRESA POR ID
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
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['id'] 		= base64_encode("+_23_".$id_final."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
			$data['emp'] 		= $this->empresa_model->empresa_sucursal_id($id_final);
			$data['years'] 		= $this->empresa_model->all_years($id_final);
			$data['sucursales']	= $this->empresa_model->all_sucursal_id($id_final);
			$this->template->render("mantenimiento/empresas/view_empresa_sucursal", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}		
	}

	public function edit_sucursal($id = 0) { //FORMULARIO PARA EDITAR LA EMPRESA GRANDE
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
		    $data['classMttoEmpresa']="active";
		    $data['classMttoUsuario']="";
		    $data['classMttoActividad']="";
			$data['emp'] = $this->empresa_model->empresa_sucursal_id($id_final);
			$data['tclientes'] = $this->empresa_model->config_system_option(1); //OBTENER LISTA DE TIPO DE CLIENTES
			$data['tEstCliente'] = $this->empresa_model->config_system_option(2); // OBTIENE LOS ESTADOS ACTIVOS O INACTIVOS DE LOS CLIENTES
			$data['tRepositorio'] = $this->empresa_model->config_system_option(3); // OBTIENES LOS TIPOS DE REPOSITORIOS
			$this->template->render("mantenimiento/empresas/edit_sucursal", $data);
		} else {
			$this->template->render("mantenimiento/proximamente/view");
		}
	}
}