<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cliente extends MY_Controller {
	
	function __construct() {
		parent:: __construct();

		//$this->load->library('drive');
		require_once APPPATH ."/third_party/api-google/vendor/autoload.php";
		$this->load->database();
		$this->load->model("empresa_model");
		$this->load->model("cliente_model");
		$this->load->model("custom/customrol_model", "customrol");
	}

	##################################################################################################################
	# PERMISOS
	##################################################################################################################
	private function ex_gerencia() {
		return $this->customrol->ex_gerencia();
	}

	private function ex_jefatura() {
		return $this->customrol->ex_jefatura();
	}

	private function ex_controller() {
		return $this->customrol->ex_controller();
	}

	private function exlog_supervisor() {
		return $this->customrol->exlog_supervisor();
	}

	private function exlog_colaborador() {
		return $this->customrol->exlog_colaborador();
	}

	private function exlog_cliente() {
		return $this->customrol->exlog_cliente();
	}

	private function alm_cliente_modo() {
		return $this->customrol->alm_cliente_modo();
	}

	private function alm_clientes() {
		return $this->customrol->alm_clientes();
	}
	

	##################################################################################################################
	##################################################################################################################
	
	function verificaacceso() {
		if ( $this->ex_gerencia() || $this->ex_jefatura() || $this->ex_controller()|| $this->exlog_supervisor() || $this->exlog_colaborador()|| $this->exlog_cliente()) {			
			return true;
		}
	}

	public function index() { // MUESTRA LISTADO PRINCIPAL
		//if($this->verificaacceso() == true){

		if( $this->ex_gerencia() || $this->ex_jefatura() || $this->ex_controller() ){
			$clientes_activos = 'all';
		} elseif ( $this->alm_cliente_modo() == 'all' ){
			$clientes_activos = 'all';
		} else {
			$clientes_activos = $this->alm_clientes();
		}

		//$dataSidebar = array();
	    $data['classInicio']="";
	    $data['classCliente']="active";
	    $data['classReporte']="";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
	    
		$data['cli_activos'] = $clientes_activos;
		$data['clientes'] = $this->cliente_model->allClientes();
		$data['tclientes'] = $this->empresa_model->config_system_option(1); //OBTENER LISTA DE TIPO DE CLIENTES
		$data['tEstCliente'] = $this->empresa_model->config_system_option(2); // OBTIENE LOS ESTADOS ACTIVOS O INACTIVOS DE LOS CLIENTES
		$data['tRepositorio'] = $this->empresa_model->config_system_option(3); // OBTIENES LOS TIPOS DE REPOSITORIOS
		$this->template->render("gestion/modulo_cliente/list", $data);		
	}

	public function viewClient($id = 0){ // VISTA GENERAL DE LA EMPRESA POR ID
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_final= $explora[2];
		} else {
			return false;
		}
		$data['classInicio']="";
	    $data['classCliente']="active";
	    $data['classReporte']="";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
		//if($this->verificaacceso() == true){
		$data['id'] 		= base64_encode("+_23_".$id_final."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
		$data['emp'] 		= $this->cliente_model->empresa_id($id_final);
		$data['years'] 		= $this->cliente_model->year_all_id($id_final);
		$this->template->render("gestion/modulo_cliente/view_year", $data);
		/*} else {
			$this->template->render("mantenimiento/proximamente/view");
		}		*/
	}

	public function viewMonth($id = 0){ //VISTA GENERAL DE MESES POR ID DE EMPRESA Y AÑO
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_anio= $explora[2];
			$id_empresa= $explora[3];
		} else {
			return false;
		}

		$data['classInicio']="";
	    $data['classCliente']="active";
	    $data['classReporte']="";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
		$data['id'] 		= base64_encode("+_23_".$id_empresa."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
		$data['emp'] 		= $this->cliente_model->empresa_id($id_empresa);
		$data['anio'] 		= $this->cliente_model->year_id($id_anio);
		$data['meses']		= $this->cliente_model->month_all_id($id_anio);
		$this->template->render("gestion/modulo_cliente/view_month", $data);
	
	}

	public function viewFile($id = 0){ //VISTA GENERAL DE MESES POR ID DE EMPRESA Y AÑO
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_mes= $explora[2];
			$id_anio= $explora[3];
			$id_empresa= $explora[4];
		} else {
			return false;
		}

		$data['classInicio']="";
	    $data['classCliente']="active";
	    $data['classReporte']="";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
		$data['id'] 		= base64_encode("+_23_".$id_empresa."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
		$data['emp'] 		= $this->cliente_model->empresa_id($id_empresa);
		$data['anio'] 		= $this->cliente_model->year_id($id_anio);
		$data['mes']		= $this->cliente_model->month_id($id_mes);
		$data['files']		= $this->cliente_model->file_all_id($id_mes);
		$this->template->render("gestion/modulo_cliente/view_file", $data);
	}

	public function viewDoc($id = 0){ //VISTA GENERAL DE DOCUMENTOS CARGADOS
		$deco = base64_decode($id);
		$explora = explode('_', $deco);

		if(!empty($explora[2])){
			$id_file= $explora[2];
			$id_mes= $explora[3];
			$id_anio= $explora[4];
			$id_empresa= $explora[5];

		} else {
			return false;
		}	

		$data['classInicio']="";
	    $data['classCliente']="active";
	    $data['classReporte']="";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";

		$data['id'] 		= base64_encode("+_23_".$id_empresa."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
		$data['emp'] 		= $this->cliente_model->empresa_id($id_empresa);
		$data['anio'] 		= $this->cliente_model->year_id($id_anio);
		$data['mes']		= $this->cliente_model->month_id($id_mes);
		$data['file']		= $this->cliente_model->file_id($id_file);
		$data['docs']		= $this->cliente_model->doc_all_id($id_file);
		//$data['files']		= $this->cliente_model->file_all_id($id_mes);
		$this->template->render("gestion/modulo_cliente/view_doc", $data);	
	}

	public function add_doc($id=0){
		$img = $this->input->post('mtxtAddDoc');
		$id_carpeta = $this->input->post('mtxtIdCarpeta');
		$id_mes= $this->input->post('mtxtIdMes');
		$id_anio= $this->input->post('mtxtIdAnio');
		$id_emp = $this->input->post('mtxtIdEmpresa');

		putenv('GOOGLE_APPLICATION_CREDENTIALS=repositorioacg-990ab92b556b.json');
		$client = new Google_Client();
		$client->useApplicationDefaultCredentials();
		$client->SetScopes(['https://www.googleapis.com/auth/drive.file']);
		
		try {
			$nombre 	= $_FILES['mtxtAddDoc']['name'];
			$extension 	= $_FILES['mtxtAddDoc']['type'];
			$peso 		= $_FILES['mtxtAddDoc']['size'];

			$descripcion = 'Guardado por SISGESDOC';
			
			$service = new Google_Service_Drive($client);
			//$file_path = "E:/SISTEMA NOTARIA/ARCHIVOS/ESCRITURAS PUBLICAS ALFABETICO 2018.csv";

			$file_path = $_FILES['mtxtAddDoc']['tmp_name'];
			$file = new Google_Service_Drive_DriveFile();
			$file->setName($nombre);

			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime_type = finfo_file($finfo, $file_path);

			$file->setParents(array("1y3Oyq-8OnDe3_qG5dNkAWFnVrPtQVtba"));
			$file->setDescription($descripcion);
			$file->setMimeType($mime_type);

			$resultado = $service->files->create(
				$file,
				array(
					'data' 		=> file_get_contents($file_path),
					'mimeType' 	=> $mime_type,
					'uploadType'=> 'media'
				)
			);

			$ruta 	= 'https://drive.google.com/open?id='. $resultado->id;


			if($qid = $this->cliente_model->add_doc($id_carpeta, $nombre, $extension, $ruta, $peso, $descripcion)){
				//echo 'si_'.$qid;
				$uri = base64_encode("+_23_".$id_carpeta.'_'.$id_mes.'_'.$id_anio.'_'.$id_emp."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN"); //CODIFICACION A BASE 64
				echo 'si_'.$uri;
			}else{
				echo 'Error en el registro. <br>'.$qid;
			}
			//echo '<a href="'. $ruta .'" target="_blank">'.$resultado->name.'</a>';
		} catch (Google_Servide_Exception $gs) {
			$mensaje = json_decode($gs->getMessage());
			echo $mensaje->error->message();
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}

	public function repor($id = 0) { // MUESTRA LISTADO PRINCIPAL
		//if($this->verificaacceso() == true){

		if( $this->ex_gerencia() || $this->ex_jefatura() || $this->ex_controller() ){
			$clientes_activos = 'all';
		} elseif ( $this->alm_cliente_modo() == 'all' ){
			$clientes_activos = 'all';
		} else {
			$clientes_activos = $this->alm_clientes();
		}

		$data['classInicio']="";
	    $data['classCliente']="";
	    $data['classReporte']="active";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
		$data['cli_activos'] 	= $clientes_activos;
		$data['clientes'] 		= $this->cliente_model->allClientes();
			$data['tclientes'] 		= $this->empresa_model->config_system_option(1); //OBTENER LISTA DE TIPO DE CLIENTES
			$data['tEstCliente'] 	= $this->empresa_model->config_system_option(2); // OBTIENE LOS ESTADOS ACTIVOS O INACTIVOS DE LOS CLIENTES
			$data['tRepositorio'] 	= $this->empresa_model->config_system_option(3); // OBTIENES LOS TIPOS DE REPOSITORIOS
			$data['anio'] 			= $this->empresa_model->config_system_option(4); // OBTIENES TODOS LOS AÑOS
			$data['entregable'] 	= $this->empresa_model->config_system_option(5); // OBTIENES TODOS LOS TIPOS DE ENTREGABLES
			$data['reults']			= $this->cliente_model->getArchivos();
			$this->template->render("gestion/modulo_cliente/reporte", $data);
		//} else {
			//$this->template->render("mantenimiento/proximamente/view");
		//}
		}

	public function resultado($id = 0) { // MUESTRA LISTADO PRINCIPAL
		$empresa 	= $this->input->post('cboEmpresa');
		$yearIni 	= $this->input->post('cboYearIni');
		$yearFin 	= $this->input->post('cboYearFin');
		$mesIni 	= $this->input->post('cboMesIni');
		$mesFin 	= $this->input->post('cboMesFin');
		$carpeta 	= $this->input->post('cboCarpeta');

		$archivos = $this->cliente_model->getArchivos($empresa,$yearIni, $yearFin, $mesIni, $mesFin, $carpeta);
		if( $this->ex_gerencia() || $this->ex_jefatura() || $this->ex_controller() ){
			$clientes_activos = 'all';
		} elseif ( $this->alm_cliente_modo() == 'all' ){
			$clientes_activos = 'all';
		} else {
			$clientes_activos = $this->alm_clientes();
		}

		$data['classInicio']="";
	    $data['classCliente']="";
	    $data['classReporte']="active";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="";
	    
		$data['cli_activos'] 	= $clientes_activos;
		$data['clientes'] 		= $this->cliente_model->allClientes();
		$data['tclientes'] 		= $this->empresa_model->config_system_option(1); //OBTENER LISTA DE TIPO DE CLIENTES
		$data['tEstCliente'] 	= $this->empresa_model->config_system_option(2); // OBTIENE LOS ESTADOS ACTIVOS O INACTIVOS DE LOS CLIENTES
		$data['tRepositorio'] 	= $this->empresa_model->config_system_option(3); // OBTIENES LOS TIPOS DE REPOSITORIOS
		$data['anio'] 			= $this->empresa_model->config_system_option(4); // OBTIENES TODOS LOS AÑOS
		$data['entregable'] 	= $this->empresa_model->config_system_option(5); // OBTIENES TODOS LOS TIPOS DE ENTREGABLES
		$data['reults']			= $archivos;
		$this->template->render("gestion/modulo_cliente/reporte", $data);
	}

/*	public function getResoult(){
		$clientes_activos = $this->alm_clientes();
		$a_empresa 	= $this->input->post('a_empresa');
		$a_yearIni 	= $this->input->post('a_yearIni');
		$a_yearFin 	= $this->input->post('a_yearFin');
		$a_mesIni 	= $this->input->post('a_mesIni');
		$a_mesFin 	= $this->input->post('a_mesFin');
		$a_carpeta 	= $this->input->post('a_carpeta');

		$resultado  = $this->cliente_model->getArchivos($a_empresa,$a_yearIni,$a_yearFin,$a_mesIni,$a_mesFin,$a_carpeta);
		//$resul = in_array($resultado, $clientes_activos);
		echo json_encode($resultado);
	}*/
}