<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends CI_Model {

	private $userid = null;

	function __construct()
	{
		$this->userid = $this->session->userdata('user_id');
		parent:: __construct();
	}

	public function config_system_option($id=0){ # METODO PARA EXTRAER TODOS LOS SELECT DEL FORMULARIO
		$this->db->select("*");		
		$this->db->from('ex_config_system_items ecsy');
		$this->db->join(' ex_config_system ecs','ecsy.FK_CONFSYS = ecs.PK_CONFIG_SYSTEM' );
		$this->db->where('ecsy.SYSITEM_STATUS = 1 AND ecsy.SYSITEM_DELETED = 2  AND ecsy.FK_CONFSYS = '.$id);
		return $this->db->get()->result();
	}

	public function add_empresa(){ # METODO PARA GUARDAR LA NUEVA EMPRESA
		$userid 		= $this->userid;
		$tCliente 		= $this->input->post('txtTCliente');
		$isSucursal 	= $this->input->post('txtIsSucursal');
		$empContenedor 	= $this->input->post('txtIdEmp');

		$ttcliente = (isset($tCliente)) ? $tCliente : null;
		$empCont 	= (isset($empContenedor)) ? $empContenedor : null;


		//START LOG DE REGISTRO
		$log_reg = array();		
		$log_reg[] = array(
			'VERSION' 					=> '0',			
			'FK_EX_EMP_REG' 			=> $userid,
			'EX_EMP_IS_GROUP' 			=> $ttcliente,
			'EX_EMP_IS_SUCURSAL'		=> $isSucursal,
			'FK_EX_EMPRESA_CONTENEDORA' => $empCont,
			'EX_EMP_RUC' 				=> $this->input->post('txtDocumento'),
			'EX_EMP_RS' 				=> $this->input->post('txtRS'),
			'EX_EMP_DIRECCION' 			=> $this->input->post('txtDireccion'),
			'EX_EMP_UBIGEO' 			=> $this->input->post('txtUbigeo'),
			'EX_EMP_ESTADO_RUC' 		=> $this->input->post('txtEstadoEmpresa'),
			'EX_EMP_CONDICION_RUC' 		=> $this->input->post('txtCondEmpresa'),
			'EX_EMP_TIPO_REPOSITORIO' 	=> $this->input->post('txtTRepositorio'),
			'EX_EMP_SUP_RESPONSABLE'	=> $this->input->post('cboSupervisor'),
			'EX_EMP_CONT_RESPONSABLE'	=> $this->input->post('cboContador'),
			'EX_EMP_REPORT_ASIGNADO'	=> serialize($this->input->post('cboReportes')),
			'EX_EMP_FEC_INICIO' 		=> $this->input->post('txtFecIngreso'),
			'EX_EMP_ESTADO' 			=> $this->input->post('cboEstadoCliente'),
			'EX_EMP_DELETED' 			=> '2',
			'EX_EMP_FEC_REGISTRO' 		=> date('Y-m-d H:i:s')		
		);
		$json_emp = json_encode($log_reg);
		//END LOG REGISTRO

		$detalles = array(

			'FK_EX_EMP_REG' 			=> $userid,
			'EX_EMP_IS_GROUP' 			=> $ttcliente,
			'EX_EMP_IS_SUCURSAL'		=> $isSucursal,
			'FK_EX_EMPRESA_CONTENEDORA' => $empCont,
			'EX_EMP_RUC' 				=> $this->input->post('txtDocumento'),
			'EX_EMP_RS' 				=> $this->input->post('txtRS'),
			'EX_EMP_DIRECCION' 			=> $this->input->post('txtDireccion'),
			'EX_EMP_UBIGEO' 			=> $this->input->post('txtUbigeo'),
			'EX_EMP_ESTADO_RUC' 		=> $this->input->post('txtEstadoEmpresa'),
			'EX_EMP_CONDICION_RUC' 		=> $this->input->post('txtCondEmpresa'),
			'EX_EMP_TIPO_REPOSITORIO' 	=> $this->input->post('txtTRepositorio'),
			'EX_EMP_SUP_RESPONSABLE'	=> $this->input->post('cboSupervisor'),
			'EX_EMP_CONT_RESPONSABLE'	=> $this->input->post('cboContador'),
			'EX_EMP_REPORT_ASIGNADO'	=> serialize($this->input->post('cboReportes')),
			'EX_EMP_FEC_INICIO' 		=> $this->input->post('txtFecIngreso'),
			'EX_EMP_LOG'				=> $json_emp,
			'EX_EMP_ESTADO' 			=> $this->input->post('cboEstadoCliente'),
			'EX_EMP_DELETED' 			=> '2',
			'EX_EMP_FEC_REGISTRO' 		=> date('Y-m-d H:i:s')	
		);

		$empresa_res = $this->db->insert('ex_empresa', $detalles);
		$empresa_id = $this->db->insert_id();

		if ($empContenedor == '') {
			return $empresa_id;
		}else{
			return $empContenedor;
		}
		//return $empresa_id;
	}

	public function upd_empresa(){ //METODO PARA ACTUALIZAR DATOS DE LA EMPRESA
		$userid = $this->userid;
		$id_empresa = $this->input->post('txtIdEmpresa');

		$recopila = json_decode($this->recopilando_json_emp($id_empresa)->EX_EMP_LOG, TRUE); //OBTIENE EL LOG ANTERIOR
		$total = count($recopila);

		for ($i=0; $i < $total; $i++) {
			$log_reg[] = array(
				'VERSION' 					=> $i,				
				'FK_EX_EMP_REG' 			=> $recopila[$i]['FK_EX_EMP_REG'],
				'EX_EMP_IS_GROUP' 			=> $recopila[$i]['EX_EMP_IS_GROUP'],
				'EX_EMP_IS_SUCURSAL'		=> $recopila[$i]['EX_EMP_IS_SUCURSAL'],
				'FK_EX_EMPRESA_CONTENEDORA' => $recopila[$i]['FK_EX_EMPRESA_CONTENEDORA'],
				'EX_EMP_RUC' 				=> $recopila[$i]['EX_EMP_RUC'],
				'EX_EMP_RS' 				=> $recopila[$i]['EX_EMP_RS'],
				'EX_EMP_DIRECCION' 			=> $recopila[$i]['EX_EMP_DIRECCION'],
				'EX_EMP_UBIGEO' 			=> $recopila[$i]['EX_EMP_UBIGEO'],
				'EX_EMP_ESTADO_RUC' 		=> $recopila[$i]['EX_EMP_ESTADO_RUC'],
				'EX_EMP_CONDICION_RUC' 		=> $recopila[$i]['EX_EMP_CONDICION_RUC'],
				'EX_EMP_TIPO_REPOSITORIO' 	=> $recopila[$i]['EX_EMP_TIPO_REPOSITORIO'],
				'EX_EMP_SUP_RESPONSABLE'	=> (isset($recopila[$i]['EX_EMP_SUP_RESPONSABLE'])) ? $recopila[$i]['EX_EMP_SUP_RESPONSABLE']: null,
				'EX_EMP_CONT_RESPONSABLE'	=> (isset($recopila[$i]['EX_EMP_CONT_RESPONSABLE'])) ? $recopila[$i]['EX_EMP_CONT_RESPONSABLE']: null,
				'EX_EMP_REPORT_ASIGNADO'    => (isset($recopila[$i]['EX_EMP_REPORT_ASIGNADO'])) ? $recopila[$i]['EX_EMP_REPORT_ASIGNADO']: null,
				'EX_EMP_FEC_INICIO' 		=> $recopila[$i]['EX_EMP_FEC_INICIO'],
				'EX_EMP_ESTADO' 			=> $recopila[$i]['EX_EMP_ESTADO'],
				'EX_EMP_DELETED' 			=> $recopila[$i]['EX_EMP_DELETED'],
				'EX_EMP_FEC_REGISTRO'		=> $recopila[$i]['EX_EMP_FEC_REGISTRO'],
			);
		}

		//ADD LOG DE REGISTRO	
		$log_reg[] = array(
			'VERSION' 					=> $total,			
			'FK_EX_EMP_REG' 			=> $userid,
			'EX_EMP_IS_GROUP' 			=> $this->input->post('txtTCliente'),
			'EX_EMP_IS_SUCURSAL'		=> $recopila[$i-1]['EX_EMP_IS_SUCURSAL'],
			'FK_EX_EMPRESA_CONTENEDORA' => $recopila[$i-1]['FK_EX_EMPRESA_CONTENEDORA'],
			'EX_EMP_RUC' 				=> $this->input->post('txtDocumento'),
			'EX_EMP_RS' 				=> $this->input->post('txtRS'),
			'EX_EMP_DIRECCION' 			=> $this->input->post('txtDireccion'),
			'EX_EMP_UBIGEO' 			=> $this->input->post('txtUbigeo'),
			'EX_EMP_ESTADO_RUC' 		=> $this->input->post('txtEstadoEmpresa'),
			'EX_EMP_CONDICION_RUC' 		=> $this->input->post('txtCondEmpresa'),
			'EX_EMP_TIPO_REPOSITORIO' 	=> $this->input->post('txtTRepositorio'),
			'EX_EMP_SUP_RESPONSABLE'	=> $this->input->post('cboSupervisor'),
			'EX_EMP_CONT_RESPONSABLE'	=> $this->input->post('cboContador'),
			'EX_EMP_REPORT_ASIGNADO'	=> serialize($this->input->post('cboReportes')),
			'EX_EMP_FEC_INICIO' 		=> $this->input->post('txtFecIngreso'),
			'EX_EMP_ESTADO' 			=> $this->input->post('cboEstadoCliente'),
			'EX_EMP_DELETED' 			=> '2',
			'EX_EMP_FEC_REGISTRO'		=> date('Y-m-d H:i:s'),
		);
		$json_emp = json_encode($log_reg);

		$detalles = array(			
			'EX_EMP_IS_GROUP' 			=> $this->input->post('txtTCliente'),
			'EX_EMP_RUC' 				=> $this->input->post('txtDocumento'),
			'EX_EMP_RS' 				=> $this->input->post('txtRS'),
			'EX_EMP_DIRECCION' 			=> $this->input->post('txtDireccion'),
			'EX_EMP_UBIGEO' 			=> $this->input->post('txtUbigeo'),
			'EX_EMP_ESTADO_RUC' 		=> $this->input->post('txtEstadoEmpresa'),
			'EX_EMP_CONDICION_RUC' 		=> $this->input->post('txtCondEmpresa'),
			'EX_EMP_TIPO_REPOSITORIO' 	=> $this->input->post('txtTRepositorio'),
			'EX_EMP_SUP_RESPONSABLE'	=> $this->input->post('cboSupervisor'),
			'EX_EMP_CONT_RESPONSABLE'	=> $this->input->post('cboContador'),
			'EX_EMP_REPORT_ASIGNADO'	=> serialize($this->input->post('cboReportes')),
			'EX_EMP_FEC_INICIO' 		=> $this->input->post('txtFecIngreso'),
			'EX_EMP_LOG'				=> $json_emp,
			'EX_EMP_ESTADO' 			=> $this->input->post('cboEstadoCliente')
		);
		
		$this->db->update('ex_empresa',$detalles,array('PK_EX_EMPRESA' => $id_empresa));		
		return $id_empresa;
	}

	public function empresas($id=0){ # METODO PARA EXTRAER TODAS LAS EMPRESAS 
		$this->db->select("*,(SELECT COUNT(emp1.PK_EX_EMPRESA) FROM ex_empresa emp1 WHERE emp1.EX_EMP_IS_SUCURSAL = 1 AND emp1.EX_EMP_DELETED = 2  AND emp1.EX_EMP_ESTADO = 1 AND emp1.FK_EX_EMPRESA_CONTENEDORA = emp.PK_EX_EMPRESA) AS total");
		$this->db->from('ex_empresa as emp');
		$this->db->where('emp.EX_EMP_DELETED = 2');
		return $this->db->get()->result();
	}

	public function sucursal_all($id = 0){
		$this->db->select('emp.*, empcon.EX_EMP_RS empresaC ');
		$this->db->from('ex_empresa as emp');
		$this->db->join('ex_empresa empcon','emp.FK_EX_EMPRESA_CONTENEDORA = empcon.PK_EX_EMPRESA');
		$this->db->where('emp.EX_EMP_DELETED = 2 AND emp.EX_EMP_IS_SUCURSAL = 1');
		return $this->db->get()->result();		
	}

	public function empresa_id($id=0){ # METODO PARA EXTRAER UNA EMPRESA POR SU ID
		$this->db->select("emp.*, tcli.SYSITEM_NOMBRE TCLIENTE, trep.SYSITEM_NOMBRE TREPOSITORIO, trep.SYSITEM_ARREGLO arreglo, test.SYSITEM_NOMBRE TESTADO");		
		$this->db->from('ex_empresa emp');
		$this->db->join('ex_config_system_items tcli', 'emp.EX_EMP_IS_GROUP = tcli.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items trep', 'emp.EX_EMP_TIPO_REPOSITORIO = trep.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items test', 'emp.EX_EMP_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->where('tcli.FK_CONFSYS = 1 AND trep.FK_CONFSYS = 3 AND test.FK_CONFSYS = 2 AND emp.EX_EMP_DELETED = 2 AND emp.PK_EX_EMPRESA ='.$id);
		return $this->db->get()->row(); 
	}

	public function empresa_sucursal_id($id=0){
		$this->db->select("emp.*, trep.SYSITEM_NOMBRE TREPOSITORIO, test.SYSITEM_NOMBRE TESTADO, empcon.EX_EMP_RS empContenedor");		
		$this->db->from('ex_empresa emp');
		$this->db->join('ex_config_system_items trep', 'emp.EX_EMP_TIPO_REPOSITORIO = trep.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items test', 'emp.EX_EMP_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->join('ex_empresa empcon','emp.FK_EX_EMPRESA_CONTENEDORA = empcon.PK_EX_EMPRESA');
		$this->db->where('trep.FK_CONFSYS = 3 AND test.FK_CONFSYS = 2 AND emp.EX_EMP_DELETED = 2 AND emp.EX_EMP_IS_SUCURSAL = 1 AND emp.PK_EX_EMPRESA ='.$id);
		return $this->db->get()->row(); 
	}

	public function add_anio(){ # METODO PARA AGREGAR NUEVO AÑO
		$userid = $this->userid;
		$id_empresa = $this->input->post('isIdEmpp');
		$t_repositorio = $this->input->post('txtTRep');

		//START LOG DE REGISTRO
		$log_reg = array();		
		$log_reg[] = array(
			'VERSION' 				=> '0',
			'FK_EX_EMP_REG' 		=> $userid,
			'FK_EX_EMPRESA' 		=> $id_empresa,
			'EX_ANIO_NOMBRE' 		=> $this->input->post('mtxtAddAnio'),
			'EX_ANIO_ESTADO' 		=> '1',
			'EX_ANIO_DELETED' 		=> '2',
			'EX_ANIO_FEC_REGISTRO'	=> date('Y-m-d H:i:s')	
		);
		$json_anio = json_encode($log_reg);
		//END LOG REGISTRO

		$detalles = array(

			'FK_EX_EMP_REG' 			=> $userid,
			'FK_EX_EMPRESA'				=> $id_empresa,
			'EX_ANIO_NOMBRE' 			=> $this->input->post('mtxtAddAnio'),
			'EX_ANIO_LOG' 				=> $json_anio,
			'EX_ANIO_ESTADO' 			=> '1',
			'EX_ANIO_DELETED' 			=> '2',
			'EX_ANIO_FEC_REGISTRO'		=> date('Y-m-d H:i:s')	
		);
		$anio_res = $this->db->insert('ex_doc_anio', $detalles);
		$anio_id = $this->db->insert_id();

		$meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SETIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");

		/*	if ($t_repositorio == '1') { $carpetas = $data_all; }
			elseif($t_repositorio == '2'){ $carpetas = array("IMPUESTOS", "EEFF", "OTROS"); }
			elseif($t_repositorio == '3'){ $carpetas = array("IMPUESTOS", "EEFF", "PLE", "OTROS"); }
		*/

		$reportes = $this->recopilando_json_emp($id_empresa)->EX_EMP_REPORT_ASIGNADO; 
		$array = unserialize($reportes);
		$data_all = array();
		for ($i=0; $i < count($array); $i++){ 
			$nombre_tipo = $this->recopilando_reporte($array[$i]);
			$data_all[] = $nombre_tipo->TIP_NOMBRE;
		}
		
		$carpetas = $data_all;
		

		for ($i=0; $i < count($meses); $i++) { 
			$log_mes = array();
			$log_mes[] = array(
				'VERSION' 				=> '0',
				'FK_EX_EMP_REG'			=> $userid,
				'FK_EX_DOC_ANIO'		=> $anio_id,
				'EX_CODIGO_MES'			=> $i + 1,
				'EX_MES_NOMBRE' 		=> $meses[$i],
				'EX_MES_ESTADO' 		=> '1',
				'EX_MES_DELETED' 		=> '2',
				'EX_MES_FEC_REGISTRO' 	=> date('Y-m-d H:i:s')
			);
			$json_mes = json_encode($log_mes);

			$items = array(
				'FK_EX_EMP_REG'			=> $userid,
				'FK_EX_DOC_ANIO' 		=> $anio_id,
				'EX_CODIGO_MES'			=> $i + 1,
				'EX_MES_NOMBRE' 		=> $meses[$i],
				'EX_MES_LOG'			=> $json_mes,
				'EX_MES_ESTADO' 		=> '1',
				'EX_MES_DELETED'		=> '2',
				'EX_MES_FEC_REGISTRO' 	=> date('Y-m-d H:i:s')
			);
			$meses_res = $this->db->insert('ex_doc_mes', $items);
			$mes_id = $this->db->insert_id();

			for ($j=0; $j < count($carpetas); $j++) { 

				$log_carpeta = array();
				$log_carpeta[] = array(
					'VERSION' 					=> '0',
					'FK_EX_EMP_REG'				=> $userid,
					'FK_EX_DOC_MES'				=> $mes_id,
					'EX_CARPETA_NOMBRE' 		=> $carpetas[$j],
					'EX_CARPETA_ESTADO' 		=> '1',
					'EX_CARPETA_DELETED' 		=> '2',
					'EX_CARPETA_FEC_REGISTRO' 	=> date('Y-m-d H:i:s')
				);
				$json_carpeta = json_encode($log_carpeta);

				$itemCarpetas = array(
					'FK_EX_EMP_REG'				=> $userid,
					'FK_EX_DOC_MES'				=> $mes_id,
					'EX_CARPETA_NOMBRE' 		=> $carpetas[$j],
					'EX_CARPETA_LOG'			=> $json_carpeta,
					'EX_CARPETA_ESTADO' 		=> '1',
					'EX_CARPETA_DELETED' 		=> '2',
					'EX_CARPETA_FEC_REGISTRO'	=> date('Y-m-d H:i:s')
				);
				$carpetas_res = $this->db->insert('ex_doc_carpeta', $itemCarpetas);
			}
		}
		return $id_empresa;
	}

	public function add_mes(){ # METODO PARA GUARDAR UN NUEVO MES
		$userid = $this->userid;
		$id_empresa = $this->input->post('isIdEmpp');	
		$id_anio	= $this->input->post('txtIdAnio');

		//START LOG DE REGISTRO
		$log_reg = array();		
		$log_reg[] = array(
			'VERSION' 				=> '0',		
			'FK_EX_EMP_REG' 		=> $userid,
			'FK_EX_DOC_ANIO'		=> $id_anio,
			'EX_MES_NOMBRE'			=> $this->input->post('mtxtAddMes'),
			'EX_MES_ESTADO'			=> '1',
			'EX_MES_DELETED'		=> '2',
			'EX_MES_FEC_REGISTRO'	=> date('Y-m-d H:i:s')		
		);
		$json_mes = json_encode($log_reg);
		//END LOG REGISTRO

		$detalles = array(
			'FK_EX_EMP_REG' 		=> $userid,
			'FK_EX_DOC_ANIO'		=> $id_anio,
			'EX_MES_NOMBRE'			=> $this->input->post('mtxtAddMes'),
			'EX_MES_LOG'			=> $json_mes,
			'EX_MES_ESTADO'			=> '1',
			'EX_MES_DELETED'		=> '2',
			'EX_MES_FEC_REGISTRO'	=> date('Y-m-d H:i:s')	
		);
		$mes_res = $this->db->insert('ex_doc_mes', $detalles);
		return $id_anio.'_'.$id_empresa;
	}

	public function all_years($id=0){ # METODO PARA EXTRAER TODOS LOS AÑOS DE UNA EMPRESA
		$this->db->select("*, (SELECT COUNT(mes.PK_EX_MES) FROM ex_doc_mes mes WHERE mes.EX_MES_ESTADO = 1 AND mes.EX_MES_DELETED = 2 AND mes.FK_EX_DOC_ANIO = anio.PK_EX_ANIO) totalMes");
		$this->db->from('ex_doc_anio anio');
		$this->db->join('ex_empresa emp','anio.FK_EX_EMPRESA = emp.PK_EX_EMPRESA');
		$this->db->where('anio.EX_ANIO_DELETED = 2 and anio.FK_EX_EMPRESA ='.$id);		
		return $this->db->get()->result();
	}

	public function all_sucursal_id($id=0){ # METODO PARA EXTRAER TODAS LAS SUCURSALES POR ID DE CONTENEDOR
		$this->db->select("*");
		$this->db->from('ex_empresa emp');
		$this->db->where('emp.EX_EMP_DELETED = 2 AND emp.EX_EMP_IS_SUCURSAL = 1 AND emp.EX_EMP_IS_GROUP = 0 AND emp.FK_EX_EMPRESA_CONTENEDORA ='.$id);		
		return $this->db->get()->result();
	}

	public function all_month($id=0){ # METODO PARA EXTRAER TODOS LOS MESES DE UNA EMPRESA EN UN AÑO
		$this->db->select("*, (SELECT COUNT(car.PK_EX_CARPETA) FROM ex_doc_carpeta car WHERE car.EX_CARPETA_DELETED = 2  AND car.EX_CARPETA_ESTADO = 1 AND car.FK_EX_DOC_MES = me.PK_EX_MES) AS TOTCAR");		
		$this->db->from('ex_doc_mes me');
		$this->db->join('ex_doc_anio an','me.FK_EX_DOC_ANIO = an.PK_EX_ANIO');
		$this->db->join('ex_empresa emp','an.FK_EX_EMPRESA = emp.PK_EX_EMPRESA');
		$this->db->where('me.EX_MES_DELETED = 2 and me.FK_EX_DOC_ANIO ='.$id);

		return $this->db->get()->result(); 
	}

	public function mUpdAnio(){ //METODO PARA ACTUALIZAR DATOS DEL ANO
		$userid = $this->userid;
		$id_anio = $this->input->post('mtxtUpdIdAnio');
		$id_empresa = $this->input->post('isIdEmpp');

		$recopila = json_decode($this->recopilando_json_anio($id_anio)->EX_ANIO_LOG, TRUE); //OBTIENE EL LOG ANTERIOR
		$total = count($recopila);

		for ($i=0; $i < $total; $i++) {
			$log_reg[] = array(
				'VERSION' 				=> $i,	
				'FK_EX_EMP_REG' 		=> $recopila[$i]['FK_EX_EMP_REG'],
				'FK_EX_EMPRESA' 		=> $recopila[$i]['FK_EX_EMPRESA'],
				'EX_ANIO_NOMBRE' 		=> $recopila[$i]['EX_ANIO_NOMBRE'],
				'EX_ANIO_ESTADO' 		=> $recopila[$i]['EX_ANIO_ESTADO'],
				'EX_ANIO_DELETED' 		=> $recopila[$i]['EX_ANIO_DELETED'],
				'EX_ANIO_FEC_REGISTRO' 	=> $recopila[$i]['EX_ANIO_FEC_REGISTRO'],
			);
		}

		//ADD LOG DE REGISTRO	
		$log_reg[] = array(

			'VERSION' 				=> $total,			
			'FK_EX_EMP_REG' 		=> $userid,
			'FK_EX_EMPRESA' 		=> $recopila[$i-1]['FK_EX_EMPRESA'],
			'EX_ANIO_NOMBRE'		=> $this->input->post('mtxtUpdNomAnio'),
			'EX_ANIO_ESTADO' 		=> $this->input->post('mcboUpdEstado'),
			'EX_ANIO_DELETED' 		=> '2',
			'EX_ANIO_FEC_REGISTRO'	=> date('Y-m-d H:i:s'),
		);
		$json_anio = json_encode($log_reg);

		$detalles = array(							
			'EX_ANIO_NOMBRE'		=> $this->input->post('mtxtUpdNomAnio'),
			'EX_ANIO_LOG'			=> $json_anio,
			'EX_ANIO_ESTADO'		=> $this->input->post('mcboUpdEstado'),
			'EX_ANIO_DELETED'		=> '2'
		);
		
		$this->db->update('ex_doc_anio',$detalles,array('PK_EX_ANIO' => $id_anio));		
		return $id_empresa;
	}

	public function mUpdMes(){ //METODO PARA ACTUALIZAR DATOS DEL MES
		$userid = $this->userid;
		$id_mes = $this->input->post('mtxtUpdIdMes');
		$id_anio = $this->input->post('isidAnio');
		$id_empresa = $this->input->post('isIdEmpp');

		$recopila = json_decode($this->recopilando_json_mes($id_mes)->EX_MES_LOG, TRUE); //OBTIENE EL LOG ANTERIOR
		$total = count($recopila);

		for ($i=0; $i < $total; $i++) {
			$log_reg[] = array(
				'VERSION' 				=> $i,	
				'FK_EX_EMP_REG' 		=> $recopila[$i]['FK_EX_EMP_REG'],
				'FK_EX_DOC_ANIO' 		=> $recopila[$i]['FK_EX_DOC_ANIO'],
				'EX_MES_NOMBRE' 		=> $recopila[$i]['EX_MES_NOMBRE'],
				'EX_MES_ESTADO' 		=> $recopila[$i]['EX_MES_ESTADO'],
				'EX_MES_DELETED' 		=> $recopila[$i]['EX_MES_DELETED'],
				'EX_MES_FEC_REGISTRO' 	=> $recopila[$i]['EX_MES_FEC_REGISTRO'],
			);
		}

		$log_reg[] = array(
			'VERSION' 				=> $i,	
			'FK_EX_EMP_REG' 		=> $userid,
			'FK_EX_DOC_ANIO' 		=> $recopila[$i-1]['FK_EX_DOC_ANIO'],
			'EX_MES_NOMBRE' 		=> $this->input->post('mtxtUpdNomMes'),
			'EX_MES_ESTADO' 		=> $this->input->post('mcboUpdEstado'),
			'EX_MES_DELETED' 		=> '2',
			'EX_MES_FEC_REGISTRO' 	=> date('Y-m-d H:i:s'),
		);
		$json_mes = json_encode($log_reg);

		$detalles = array(				
			'EX_MES_NOMBRE' 		=> $this->input->post('mtxtUpdNomMes'),
			'EX_MES_LOG'			=> $json_mes,
			'EX_MES_ESTADO' 		=> $this->input->post('mcboUpdEstado'),
		);
		
		$this->db->update('ex_doc_mes',$detalles,array('PK_EX_MES' => $id_mes));		
		return $id_anio.'_'.$id_empresa;
	}

	public function recopilando_json_emp($id = 0){
		$this->db->select('*');
		$this->db->from('ex_empresa');
		$this->db->where('PK_EX_EMPRESA = "'.$id.'" ');
		return $this->db->get()->row();
	}
	public function recopilando_reporte($id = 0){
		$this->db->select('*');
		$this->db->from('act_tipos');
		$this->db->where('PK_TIP_CODI = "'.$id.'" ');
		return $this->db->get()->row();
	}

	public function recopilando_json_anio($id = 0){
		$this->db->select('*');
		$this->db->from('ex_doc_anio');
		$this->db->where('PK_EX_ANIO = "'.$id.'" ');
		return $this->db->get()->row();
	}

	public function recopilando_json_mes($id = 0){
		$this->db->select('*');
		$this->db->from('ex_doc_mes');
		$this->db->where('PK_EX_MES = "'.$id.'" ');
		return $this->db->get()->row();
	}

	public function anio_id($id=0){
		$this->db->select('*');
		$this->db->from('ex_doc_anio an');
		$this->db->where('an.EX_ANIO_DELETED = 2 AND an.PK_EX_ANIO ='.$id);
		return $this->db->get()->row();
	}

	public function mes_id($id=0){
		$this->db->select('*');
		$this->db->from('ex_doc_mes me');
		$this->db->where('me.EX_MES_DELETED = 2 AND me.PK_EX_MES ='.$id);
		return $this->db->get()->row();
	}

	public function all_files_id($id=0){ # METODO PARA EXTRAER TODAS LAS CARPETAS DE UNA EMPRESA EN UN MES
		$this->db->select("*");		
		$this->db->from('ex_doc_carpeta car');
		$this->db->join('ex_doc_mes me','car.FK_EX_DOC_MES = me.PK_EX_MES');
		$this->db->join('ex_doc_anio an','me.FK_EX_DOC_ANIO = an.PK_EX_ANIO');
		$this->db->join('ex_empresa em','an.FK_EX_EMPRESA =  em.PK_EX_EMPRESA');
		$this->db->where('car.EX_CARPETA_DELETED = 2 AND car.FK_EX_DOC_MES ='.$id);

		return $this->db->get()->result(); 
	}

	public function add_file(){ # METODO PARA GUARDAR UN NUEVA CARPETA
		$userid 	= $this->userid;
		$id_empresa = $this->input->post('mtxtIdEmpresa');	
		$id_anio	= $this->input->post('mtxtIdAnio');
		$id_mes		= $this->input->post('mtxtIdMes');

		//START LOG DE REGISTRO
		$log_reg = array();		
		$log_reg[] = array(
			'VERSION' 					=> '0',	
			'FK_EX_EMP_REG' 			=> $userid,
			'FK_EX_DOC_MES'				=> $id_anio,
			'EX_CARPETA_NOMBRE'			=> $this->input->post('mtxtAddFile'),
			'EX_CARPETA_ESTADO'			=> '1',
			'EX_CARPETA_DELETED'		=> '2',
			'EX_CARPETA_FEC_REGISTRO'	=> date('Y-m-d H:i:s')	
		);
		$json_file = json_encode($log_reg);
		//END LOG REGISTRO

		$detalles = array(
			'FK_EX_EMP_REG' 			=> $userid,
			'FK_EX_DOC_MES'				=> $id_mes,	
			'EX_CARPETA_NOMBRE'			=> $this->input->post('mtxtAddFile'),
			'EX_CARPETA_LOG'			=> $json_file,
			'EX_CARPETA_ESTADO'			=> '1',
			'EX_CARPETA_DELETED'		=> '2',
			'EX_CARPETA_FEC_REGISTRO'	=> date('Y-m-d H:i:s')	
		);
		$mes_res = $this->db->insert('ex_doc_carpeta', $detalles);
		return $id_mes.'_'.$id_anio.'_'.$id_empresa;
	}

	public function upd_file(){ //METODO PARA ACTUALIZAR DATOS DEL ANO
		$userid 	= $this->userid;
		$id_carpeta = $this->input->post('mtxtUpdIdFile');
		$id_mes 	= $this->input->post('mtxtUpdIdMes');
		$id_anio 	= $this->input->post('mtxtUpdIdAnio');
		$id_empresa = $this->input->post('mtxtUpdIdEmpresa');

		$recopila = json_decode($this->recopilando_json_file($id_carpeta)->EX_CARPETA_LOG, TRUE); //OBTIENE EL LOG ANTERIOR
		$total = count($recopila);

		for ($i=0; $i < $total; $i++) {
			$log_reg[] = array(
				'VERSION' 					=> $i,
				'FK_EX_EMP_REG' 			=> $recopila[$i]['FK_EX_EMP_REG'],
				'FK_EX_DOC_MES' 			=> $recopila[$i]['FK_EX_DOC_MES'],
				'EX_CARPETA_NOMBRE' 		=> $recopila[$i]['EX_CARPETA_NOMBRE'],
				'EX_CARPETA_ESTADO' 		=> $recopila[$i]['EX_CARPETA_ESTADO'],
				'EX_CARPETA_DELETED' 		=> $recopila[$i]['EX_CARPETA_DELETED'],
				'EX_CARPETA_FEC_REGISTRO' 	=> $recopila[$i]['EX_CARPETA_FEC_REGISTRO']
			);
		}

		//ADD LOG DE REGISTRO	
		$log_reg[] = array(
			'VERSION' 					=> $total,	
			'FK_EX_EMP_REG' 			=> $userid,
			'FK_EX_DOC_MES'				=> $id_mes,
			'EX_CARPETA_NOMBRE'			=> $this->input->post('mtxtUpdNomFile'),
			'EX_CARPETA_ESTADO'			=> $this->input->post('mcboUpdFile'),
			'EX_CARPETA_DELETED'		=> '2',
			'EX_CARPETA_FEC_REGISTRO'	=> date('Y-m-d H:i:s'),
		);
		$json_file = json_encode($log_reg);

		$detalles = array(		
			'EX_CARPETA_NOMBRE'			=> $this->input->post('mtxtUpdNomFile'),
			'EX_CARPETA_LOG'			=> $json_file,
			'EX_CARPETA_ESTADO'			=> $this->input->post('mcboUpdFile'),
		);
		
		$this->db->update('ex_doc_carpeta',$detalles,array('PK_EX_CARPETA' => $id_carpeta));		
		return $id_mes.'_'.$id_anio.'_'.$id_empresa;
	}

	public function recopilando_json_file($id = 0){ //RECOPILA JSON DE CARPETAS O FILE
		$this->db->select('*');
		$this->db->from('ex_doc_carpeta');
		$this->db->where('PK_EX_CARPETA = "'.$id.'" ');
		return $this->db->get()->row();
	}

	public function insert_actividad($items){
		$this->db->insert('act_actividad', $items);
	}

	public function get_reportes($id = 0){
		$this->db->select('*');
		$this->db->from('act_tipos actt');
		$this->db->where('actt.TIP_AREA = 200');
		return $this->db->get()->result();
	}

	/*public function add_sede(){ # METODO PARA GUARDAR LA NUEVA EMPRESA
		$idEmpresa = $this->input->post('mtxtAddId');
		$userid = $this->userid;
		$detalles = array(
			'FK_EMPRESA'				=> $idEmpresa,
			'FK_EX_EMP_REG' 			=> $userid,
			'EX_SEDE_NOMBRE' 			=> $this->input->post('mtxtAddNomSede'),
			'EX_SEDE_DIRECCION' 		=> $this->input->post('mtxtAddDirSede'),
			'EX_SEDE_NOM_CONTACTO' 		=> $this->input->post('mtxtAddNomContacto'),
			'EX_SEDE_EMAIL_CONTACTO' 	=> $this->input->post('mtxtAddEmailContacto'),
			'EX_SEDE_CEL_CONTACTO' 		=> $this->input->post('mtxtAddCelContacto'),
			'EX_SEDE_ESTADO' 			=> '1',
			'EX_SEDE_DELETED' 			=> '2',
			'EX_SEDE_FEC_REGISTRO'		=> date('Y-m-d H:i:s')
		);
		$cotizacion_res = $this->db->insert('ex_sede_empresa', $detalles);
		//$cotizacion_id = $this->db->insert_id();

		return $idEmpresa;
	}

	public function sedes_id($id=0){ # METODO PARA EXTRAER TODAS LAS EMPRESAS 
		$this->db->select("*");		
		$this->db->from('ex_sede_empresa as sedes');
		$this->db->where('sedes.EX_SEDE_DELETED = 2 and sedes.FK_EMPRESA ='.$id);
		return $this->db->get()->result();
	}

	public function sede($id=0){ # METODO PARA EXTRAER TODAS LAS EMPRESAS 
		$this->db->select("*");
		$this->db->where('sedes.EX_SEDE_DELETED = 2');
		$this->db->from('ex_sede_empresa as sedes');
		$this->db->join('ex_empresa as emp','sedes.FK_EMPRESA = emp.PK_EX_EMPRESA');
		return $this->db->get()->result();
	}

	public function sede_id($id=0){ # METODO PARA EXTRAER TODAS LAS EMPRESAS 
		$this->db->select("*");
		$this->db->where('sede.EX_SEDE_DELETED = 2 and sede.PK_SEDE_EMPRESA ='.$id);
		$this->db->from('ex_sede_empresa as sede');
		return $this->db->get()->row();
	}*/

	/*public function all_file($id=0){
		$this->db->select("*");		
		$this->db->from('ex_doc_carpeta car');
		$this->db->join('ex_doc_mes mes','car.FK_EX_DOC_MES = mes.PK_EX_MES');
		$this->db->join('ex_doc_anio an','mes.FK_EX_DOC_ANIO = an.PK_EX_ANIO');
		$this->db->join('ex_sede_empresa emp','an.FK_EX_SEDE_EMPRESA = emp.PK_SEDE_EMPRESA');
		$this->db->where('car.EX_CARPETA_DELETED = 2 AND car.FK_EX_DOC_MES ='.$id);
		return $this->db->get()->result();
	}	

	public function anio_id($id=0){ # METODO PARA EXTRAER EL AÑO PO ID
		$this->db->select("*, (SELECT COUNT(mes.PK_EX_MES) AS totalMes FROM ex_doc_mes mes WHERE mes.EX_MES_ESTADO = 1 AND mes.EX_MES_DELETED = 2 AND mes.FK_EX_DOC_ANIO = an.PK_EX_ANIO)");
		$this->db->from('ex_doc_anio an');
		$this->db->join('ex_sede_empresa sed','an.FK_EX_SEDE_EMPRESA = sed.PK_SEDE_EMPRESA');
		$this->db->join('ex_empresa emp','sed.FK_EX_EMP_REG = sed.PK_SEDE_EMPRESA');
		$this->db->where('an.EX_ANIO_DELETED = 2 AND an.EX_ANIO_ESTADO = 1 and an.PK_EX_ANIO ='.$id);
		
		return $this->db->get()->row();
	}

	public function upd_sede(){
		$id_sede = $this->input->post('mtxtUpdIdSede');
		$id_empresa = $this->input->post('mtxtUpdId');
		$detalles = array(
			'EX_SEDE_NOMBRE' 			=> $this->input->post('mtxtUpdNomSede'),
			'EX_SEDE_DIRECCION' 		=> $this->input->post('mtxtUpdDirSede'),
			'EX_SEDE_NOM_CONTACTO' 		=> $this->input->post('mtxtUpdNomContacto'),
			'EX_SEDE_EMAIL_CONTACTO' 	=> $this->input->post('mtxtUpdEmailContacto'),
			'EX_SEDE_CEL_CONTACTO' 		=> $this->input->post('mtxtUpdCelContacto'),
		);
		
		$this->db->update('ex_sede_empresa',$detalles,array('PK_SEDE_EMPRESA' => $id_sede));		
		return $id_empresa;
	}

	public function bajaSede($id){
		$idEmpresa = $this->sede_id($id)->FK_EMPRESA;
		if( $this->db->update('ex_sede_empresa',array('EX_SEDE_ESTADO' => '2') ,array('PK_SEDE_EMPRESA' => $id))){
			return $idEmpresa;
		}
	}

	public function altaSede($id){
		$idEmpresa = $this->sede_id($id)->FK_EMPRESA;
		if( $this->db->update('ex_sede_empresa',array('EX_SEDE_ESTADO' => '1') ,array('PK_SEDE_EMPRESA' => $id))){
			return $idEmpresa;
		}
	}*/
}