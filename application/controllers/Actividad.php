<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Actividad extends MY_Controller {
	
	function __construct() {
		parent:: __construct();

		//$this->load->library('drive');
		require_once APPPATH ."/third_party/api-google/vendor/autoload.php";
		$this->load->database();
		$this->load->model("empresa_model");
		$this->load->model("cliente_model");
		$this->load->model("custom/customrol_model", "customrol");
		$this->load->library('excel');
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
	    $data['classCliente']="";
	    $data['classReporte']="";
	    $data['classMttoEmpresa']="";
	    $data['classMttoUsuario']="";
	    $data['classMttoActividad']="active";
	    
		$data['emp'] = $this->empresa_model->empresas();
		$data['reportes'] = $this->empresa_model->get_reportes();
		$this->template->render("mantenimiento/carga_actividades/add", $data);		
	}

	public function import(){		
		if(isset($_FILES["txtArchivo"]["name"])){
			$filial = $_FILES["txtArchivo"]["name"];
			$path = $_FILES["txtArchivo"]["tmp_name"];

			$object = PHPExcel_IOFactory::load($path);

			foreach($object->getWorksheetIterator() as $worksheet){
				$cerEn 	= $worksheet->getCellByColumnAndRow(1, 2)->getValue();
				$cerFe 	= $worksheet->getCellByColumnAndRow(2, 2)->getValue();
				$cerMa 	= $worksheet->getCellByColumnAndRow(3, 2)->getValue();
				$cerAb 	= $worksheet->getCellByColumnAndRow(4, 2)->getValue();
				$cerMa 	= $worksheet->getCellByColumnAndRow(5, 2)->getValue();
				$cerJn 	= $worksheet->getCellByColumnAndRow(6, 2)->getValue();
				$cerJl 	= $worksheet->getCellByColumnAndRow(7, 2)->getValue();
				$cerAg 	= $worksheet->getCellByColumnAndRow(8, 2)->getValue();
				$cerSe 	= $worksheet->getCellByColumnAndRow(9, 2)->getValue();
				$cerOc 	= $worksheet->getCellByColumnAndRow(10, 2)->getValue();				
				$cerNo 	= $worksheet->getCellByColumnAndRow(11, 2)->getValue();				
				$cerDi 	= $worksheet->getCellByColumnAndRow(12, 2)->getValue();				
			}

			if($this->input->post('tbId')[0]){ //CONTADOR DE ITEMS
				$contar = (count($this->input->post('tbId')));
			} else {
				$contar = 0;
			}

			for ($i=0; $i < $contar; $i++) { 
				if (!empty($this->input->post('tbRet')[$i])) {
					for ($l=0; $l < 10; $l++) { 
						if ($this->input->post('tbDig')[$i] == $l ) {		
							$repRuc 	= $this->input->post('tbRuc')[$i];
							$repEmp 	= $this->input->post('tbRet')[$i];
							$explod 	= explode(",", $repEmp);
							for ($j=0; $j < count($explod); $j++) { 
								for ($k=1; $k < 13; $k++) { 
									$dia = str_pad($worksheet->getCellByColumnAndRow($k, $l+2)->getValue(), 2, "0", STR_PAD_LEFT); 
									$year = date('Y');
									$mes = str_pad($k, 2, "0", STR_PAD_LEFT);
									$f_inicio = $year.'-'.$mes.'-01';
									$f_fin = $year.'-'.$mes.'-'.$dia;
									$items = array(
										'ACT_NOMBRE' 		=> $explod[$j],
										'ACT_DESCRIPCION' 	=> 'ACTIVIDAD CREADO POR SISTEMA DE GESTION',
										'ACT_FEC_INI' 		=> $f_inicio,
										'ACT_FEC_FIN'		=> $f_fin,
										'ACT_HR_INI'		=> '09:00:00',
										'ACT_HR_INIR'		=> '00:00:00',
										'ACT_HR_FIN'		=> '18:00:00',
										'ACT_HR_FINR'		=> '00:00:00',
										'ACT_ESTADO'		=> '1',
										'ACT_RESPONSABLE'	=> $this->input->post('tbRes')[$i],
										'FK_PYS_CODI'		=> '0',
										'ACT_ELIMINA_MOTIV' => null,
										'ACT_ELIMINA_DESC'  => null,
										'ACT_REGISTRO'		=> date('Y-m-d H:i:s')
									);	
									$this->empresa_model->insert_actividad($items);
									echo json_encode($items);	
								}							
							}
						}	
					}											
				}						
			}			
		}					
	}
}