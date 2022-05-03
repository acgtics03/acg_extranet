<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	private $userid = null;

	function __construct()
	{
		$this->userid = $this->session->userdata('user_id');
		parent:: __construct();
	}

	public function allClientes($id = 0){ //OBTIENE TODOS LOS CLIENTES ACTIVOS PARA LOS USUARIOS
		/*$this->db->select('emp.*, temp.SYSITEM_NOMBRE TEMP, trep.SYSITEM_NOMBRE TREPO, test.SYSITEM_NOMBRE TESTADO, (SELECT COUNT(an.PK_EX_ANIO) FROM ex_doc_anio an WHERE an.FK_EX_EMPRESA = emp.PK_EX_EMPRESA AND an.EX_ANIO_ESTADO = 1 AND an.EX_ANIO_DELETED = 2) tanios');
		$this->db->from('ex_empresa emp');
		$this->db->join('ex_config_system_items temp', 'emp.EX_EMP_IS_GROUP = temp.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items trep', 'emp.EX_EMP_TIPO_REPOSITORIO = trep.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items test', 'emp.EX_EMP_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->where('temp.FK_CONFSYS = 1 AND trep.FK_CONFSYS = 3 AND test.FK_CONFSYS = 2 AND emp.EX_EMP_ESTADO = 1 AND emp.EX_EMP_DELETED = 2');*/

		$this->db->select(' *, (SELECT COUNT(an.PK_EX_ANIO) FROM ex_doc_anio an WHERE an.FK_EX_EMPRESA = emp.PK_EX_EMPRESA AND an.EX_ANIO_ESTADO = 1 AND an.EX_ANIO_DELETED = 2) tanios');
		$this->db->from('ex_empresa emp');
		$this->db->where('emp.EX_EMP_ESTADO = 1 AND emp.EX_EMP_DELETED = 2 AND emp.EX_EMP_IS_GROUP <> 2');
		return $this->db->get()->result();
	}

	public function empresa_id($id = 0){ //OBTIENE AL CLIENTE POR ID DE EMPRESA
		/*$this->db->select('emp.*, test.SYSITEM_NOMBRE estado, trep.SYSITEM_NOMBRE repositorio, temp.SYSITEM_NOMBRE tempresa');
		$this->db->from('ex_empresa emp');
		$this->db->join('ex_config_system_items test','emp.EX_EMP_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items trep','emp.EX_EMP_TIPO_REPOSITORIO = trep.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items temp','emp.EX_EMP_IS_GROUP = temp.SYSITEM_NREGISTRO');
		$this->db->where('test.FK_CONFSYS = 2 AND trep.FK_CONFSYS = 3 AND temp.FK_CONFSYS = 1 AND emp.PK_EX_EMPRESA ='.$id);*/


		$this->db->select('emp.*');
		$this->db->from('ex_empresa emp');
		/*$this->db->join('ex_config_system_items test','emp.EX_EMP_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items trep','emp.EX_EMP_TIPO_REPOSITORIO = trep.SYSITEM_NREGISTRO');
		$this->db->join('ex_config_system_items temp','emp.EX_EMP_IS_GROUP = temp.SYSITEM_NREGISTRO');*/
		$this->db->where('emp.PK_EX_EMPRESA ='.$id);
		return $this->db->get()->row();
	}

	public function year_all_id($id=0){ //OBTIENE LISTADO DE AÑOS POR ID DE EMPRESA
		$this->db->select('an.*, emp.EX_EMP_RS RS, test.SYSITEM_NOMBRE ESTADO, (SELECT COUNT(mes.PK_EX_MES) FROM ex_doc_mes mes WHERE mes.EX_MES_ESTADO = 1  AND mes.EX_MES_DELETED= 2 AND mes.FK_EX_DOC_ANIO = an.PK_EX_ANIO) tmes');
		$this->db->from('ex_doc_anio an');
		$this->db->join('ex_empresa emp','an.FK_EX_EMPRESA = emp.PK_EX_EMPRESA');
		$this->db->join('ex_config_system_items test','an.EX_ANIO_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->where('an.EX_ANIO_DELETED = 2 AND an.EX_ANIO_ESTADO = 1 AND test.FK_CONFSYS = 2 AND an.FK_EX_EMPRESA ='.$id);
		return $this->db->get()->result();
	}

	public function year_id($id=0){ //OBTIENE DATOS DE UN AÑO EN ESPECIFICO POR PK
		$this->db->select('*');
		$this->db->from('ex_doc_anio an');
		$this->db->where('an.PK_EX_ANIO ='. $id);
		return $this->db->get()->row();
	}

	public function month_all_id($id=0){ // OBTIENE MESES POR ID DE AÑO
		$this->db->select('mes.*, dan.EX_ANIO_NOMBRE NANIO, emp.EX_EMP_RS RS, test.SYSITEM_NOMBRE estado, (SELECT COUNT(dcar.PK_EX_CARPETA) FROM ex_doc_carpeta dcar WHERE dcar.EX_CARPETA_DELETED = 2 AND dcar.EX_CARPETA_ESTADO = 1 AND dcar.FK_EX_DOC_MES = mes.PK_EX_MES) TMES, dan.EX_ANIO_HABILITAR_DIA dh');
		$this->db->from('ex_doc_mes mes');
		$this->db->join('ex_doc_anio dan','mes.FK_EX_DOC_ANIO = dan.PK_EX_ANIO');
		$this->db->join('ex_empresa emp','dan.FK_EX_EMPRESA =  emp.PK_EX_EMPRESA');
		$this->db->join('ex_config_system_items test','mes.EX_MES_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->where('mes.EX_MES_ESTADO = 1  AND mes.EX_MES_DELETED = 2 AND test.FK_CONFSYS = 2 AND mes.FK_EX_DOC_ANIO ='.$id);
		return $this->db->get()->result();
	}

	public function month_id($id = 0){ //OBTIENE DATO DE UN ES EN PARTICULAR
		$this->db->select('*');
		$this->db->from('ex_doc_mes mes');
		$this->db->where('mes.PK_EX_MES ='. $id);
		return $this->db->get()->row();
	}

	public function file_all_id($id = 0){
		$this->db->select('dcar.*,dmes.EX_MES_NOMBRE MES, danio.EX_ANIO_NOMBRE ANIO, demp.EX_EMP_RS RS, test.SYSITEM_NOMBRE ESTADO, danio.PK_EX_ANIO anio, (SELECT COUNT(darc.PK_EX_ARCHIVO) FROM ex_doc_archivo darc WHERE darc.ARC_DELETED = 2  AND darc.FK_DOC_CARPETA = dcar.PK_EX_CARPETA) CANTARC');
		$this->db->from('ex_doc_carpeta dcar');
		$this->db->join('ex_doc_mes dmes','dcar.FK_EX_DOC_MES = dmes.PK_EX_MES');
		$this->db->join('ex_doc_anio danio','dmes.FK_EX_DOC_ANIO = danio.PK_EX_ANIO');
		$this->db->join('ex_empresa demp','danio.FK_EX_EMPRESA = demp.PK_EX_EMPRESA');
		$this->db->join('ex_config_system_items test','dcar.EX_CARPETA_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->where('test.FK_CONFSYS = 2 AND dcar.EX_CARPETA_ESTADO = 1  AND dcar.EX_CARPETA_DELETED = 2 AND dcar.FK_EX_DOC_MES ='.$id);
		return $this->db->get()->result();
	}

	public function file_id($id = 0){ //OBTIENE DATO DE UN ES EN PARTICULAR
		$this->db->select('*');
		$this->db->from('ex_doc_carpeta dcar');
		$this->db->where('dcar.PK_EX_CARPETA ='. $id);
		return $this->db->get()->row();
	}

	public function doc_all_id($id = 0){
		$this->db->select('darc.*, dcar.EX_CARPETA_NOMBRE NCAR, dcar.PK_EX_CARPETA ICAR, dmes.EX_MES_NOMBRE NMES, dmes.PK_EX_MES IMES, danio.EX_ANIO_NOMBRE NANIO, danio.PK_EX_ANIO IANIO, emp.EX_EMP_RS NEMP, emp.PK_EX_EMPRESA IEMP, test.SYSITEM_NOMBRE ESTADO');
		$this->db->from('ex_doc_archivo darc');
		$this->db->join('ex_doc_carpeta dcar','darc.FK_DOC_CARPETA = dcar.PK_EX_CARPETA');
		$this->db->join('ex_doc_mes dmes','dcar.FK_EX_DOC_MES = dmes.PK_EX_MES');
		$this->db->join('ex_doc_anio danio','dmes.FK_EX_DOC_ANIO = danio.PK_EX_ANIO');
		$this->db->join('ex_empresa emp','danio.FK_EX_EMPRESA = emp.PK_EX_EMPRESA');
		$this->db->join('ex_config_system_items test','darc.ARC_ESTADO = test.SYSITEM_NREGISTRO');
		$this->db->where('test.FK_CONFSYS = 2 AND darc.ARC_DELETED = 2 AND darc.FK_DOC_CARPETA ='.$id);
		return $this->db->get()->result();
	}

	public function add_doc($id_carpeta, $nombre, $extension, $ruta, $peso, $descripcion){ # METODO PARA GUARDAR LA NUEVA EMPRESA
		$userid 		= $this->userid;

		$detalles = array(
			'FK_EX_EMP_REG' 	=> $userid,
			'FK_DOC_CARPETA' 	=> $id_carpeta,
			'ARC_NOMBRE'		=> $nombre,
			'ARC_EXTENSION'		=> $extension,
			'ARC_PESO'			=> $peso,
			'ARC_DESCRIPCION'	=> $descripcion,
			'ARC_RUTA_DRIVE'	=> $ruta,
			'ARC_ESTADO'		=> '1',
			'ARC_DELETED'		=> '2',
			'ARC_FEC_REGISTRO' 	=> date('Y-m-d H:i:s')		
		);

		$empresa_res = $this->db->insert('ex_doc_archivo', $detalles);
		$empresa_id = $this->db->insert_id();

		return $userid;
	}


	public function getArchivos($empresa = "",$yearIni= "", $yearFin= "", $mesIni= "", $mesFin= "", $carpeta= ""){
		$this->db->select('*');
		//$this->db->from('not_legaizacion_solicitantes legs');

		$this->db->from('ex_doc_archivo darc');
		$this->db->join('ex_doc_carpeta dcar','darc.FK_DOC_CARPETA = dcar.PK_EX_CARPETA');
		$this->db->join('ex_doc_mes dmes','dcar.FK_EX_DOC_MES = dmes.PK_EX_MES');
		$this->db->join('ex_doc_anio danio','dmes.FK_EX_DOC_ANIO = danio.PK_EX_ANIO');
		$this->db->join('ex_empresa demp','danio.FK_EX_EMPRESA = demp.PK_EX_EMPRESA');
		if ($empresa != '') {
			$this->db->where('demp.PK_EX_EMPRESA = '.$empresa);
		}

		if($yearIni != '' && $yearFin != ''){
			$this->db->where('danio.EX_ANIO_NOMBRE BETWEEN "' . $yearIni . '"  AND "' .$yearFin.'"');
		}elseif ($yearIni != '' && $yearFin == '') {
			$this->db->where('danio.EX_ANIO_NOMBRE = '.$yearIni);
		}elseif ($yearIni == '' && $yearFin != '') {
			$this->db->where('danio.EX_ANIO_NOMBRE = '.$yearFin);
		}else{

		}

		if ($mesIni != '' && $mesFin != '') {
			$this->db->where('dmes.EX_MES_NOMBRE BETWEEN "' . $mesIni . '"  AND "' .$mesFin.'"');
		}elseif ($mesIni != '' && $mesFin == '') {
			$this->db->where('dmes.EX_MES_NOMBRE = '.$mesIni);
		}elseif ($mesIni == '' && $mesFin != '') {
			$this->db->where('dmes.EX_MES_NOMBRE = '.$mesFin);
		}else{

		}

		if ($carpeta != '') {
			$this->db->like('dcar.EX_CARPETA_NOMBRE',$carpeta,'both');
		}
			
		$r = $this->db->get();
		return $r->result();
	}

	/*public function getArchivos($a_empresa,$a_yearIni,$a_yearFin,$a_mesIni,$a_mesFin,$a_carpeta){
		$this->db->select('*');
		//$this->db->from('not_legaizacion_solicitantes legs');

		$this->db->from('ex_doc_archivo darc');
		$this->db->join('ex_doc_carpeta dcar','darc.FK_DOC_CARPETA = dcar.PK_EX_CARPETA');
		$this->db->join('ex_doc_mes dmes','dcar.FK_EX_DOC_MES = dmes.PK_EX_MES');
		$this->db->join('ex_doc_anio danio','dmes.FK_EX_DOC_ANIO = danio.PK_EX_ANIO');
		$this->db->join('ex_empresa demp','danio.FK_EX_EMPRESA = demp.PK_EX_EMPRESA');
		if ($a_empresa != '') {
			$this->db->where('demp.PK_EX_EMPRESA = '.$a_empresa);
		}

		if($a_yearIni != '' && $a_yearFin != ''){
			$this->db->where('danio.EX_ANIO_NOMBRE BETWEEN "' . $a_yearIni . '"  AND "' .$a_yearFin.'"');
		}elseif ($a_yearIni != '' && $a_yearFin == '') {
			$this->db->where('danio.EX_ANIO_NOMBRE = '.$a_yearIni);
		}elseif ($a_yearIni == '' && $a_yearFin != '') {
			$this->db->where('danio.EX_ANIO_NOMBRE = '.$a_yearFin);
		}else{

		}

		if ($a_mesIni != '' && $a_mesFin != '') {
			$this->db->where('dmes.EX_MES_NOMBRE BETWEEN "' . $a_mesIni . '"  AND "' .$a_mesFin.'"');
		}elseif ($a_mesIni != '' && $a_mesFin == '') {
			$this->db->where('dmes.EX_MES_NOMBRE = '.$a_mesIni);
		}elseif ($a_mesIni == '' && $a_mesFin != '') {
			$this->db->where('dmes.EX_MES_NOMBRE = '.$a_mesFin);
		}else{

		}

		if ($a_carpeta != '') {
			$this->db->like('dcar.EX_CARPETA_NOMBRE',$a_carpeta,'both');
		}

		$r = $this->db->get();
		return $r->result();
	}*/
}