<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $table = null;

	function __construct()
	{
		#parent:: __construct();
		$this->table = 'ex_empleados';
		parent::__construct($this->table);
	}

	var $tbuser = "ex_empleados as emp";
	var $order_column = array(null, null, "emp_correo_corporativo", "emp_numdoc", null); 

	//########## END LISTA
	function authenticate($txtndoc, $password) {
		$this->db->select("*");
		$result = $this->db->get_where($this->table, array('emp_numdoc' => $txtndoc, 'password' => md5($password), 'emp_estado' => 1, 'emp_deleted' => 0, 'disable_login' => 0));
		if ($result->num_rows() == 1) {
			$user_info = $result->row();

			//check client login settings
			/*if ($user_info->user_type === "client" && get_setting("disable_client_login")) {
				return false;
			} else if ($user_info->user_type === "client") {
				//user can't be loged in if client has deleted
				$clients_table = $this->db->dbprefix('clients');

				$sql = "SELECT $clients_table.id
						FROM $clients_table
						WHERE $clients_table.id= $user_info->client_id AND $clients_table.deleted=0
						";
				$client_result = $this->db->query($sql);
				if (!$client_result->num_rows()) {
					return false;
				}
			}*/

			$this->session->set_userdata('user_id', $user_info->idempleado);
			return true;
		}
	}

	#LOGIN VALIDACIONES
	function login_user_id() {
		$login_user_id = $this->session->user_id;
		return $login_user_id ? $login_user_id : false;
	}

	function sign_out() {
		$this->session->sess_destroy();
		redirect('login');
	}

	// CONSULTA DE USUARIO
	function usuario_id($id){
		$this->db->select('*');
		$this->db->where('emp.idempleado = "'.$id.'"');
		$this->db->from('ex_empleados AS emp');
		
		return $this->db->get()->row();
	}


	function get_access_info($user_id = 0) {
		$sql = "SELECT * FROM ex_empleados AS emp

		LEFT JOIN gb_roles AS rol ON rol.idrol = emp.idrol AND rol.rol_deleted <> 1
		WHERE emp.idempleado = $user_id AND emp.emp_deleted <> 1";
		return $this->db->query($sql)->row();
	}

	public function add_usuario(){ # METODO PARA GUARDAR LA NUEVA EMPRESA
		$tdoc = $this->input->post('mtxtTipoDoc');	

		if ($tdoc == '1' || $tdoc == '3') {
			$detalles = array(
				'emp_tipodoc'	=> $tdoc,
				'emp_nombres' 	=> $this->input->post('mtxtAddNombres'),
				'emp_apellidop' => $this->input->post('mtxtAddApPaterno'),
				'emp_apellidom' => $this->input->post('mtxtAddApMaterno'),
				'emp_numdoc' 	=> $this->input->post('txtDocumento'),
				'emp_tipo' 		=> 'personal',
				'password' 		=> md5($this->input->post('txtDocumento')),
				'emp_estado' 	=> '1',
				'emp_deleted' 	=> '0',
				'emp_fecha_reg'	=> date('Y-m-d H:i:s')
			);
		}elseif ($tdoc == '2') {
			$detalles = array(
				'emp_tipodoc'	=> $tdoc,
				'emp_nombres' 	=> $this->input->post('mtxtAddANomRS'),
				'emp_numdoc' 	=> $this->input->post('txtDocumento'),
				'emp_tipo' 		=> 'cliente',
				'password' 		=> md5($this->input->post('txtDocumento')),
				'emp_estado' 	=> '1',
				'emp_deleted' 	=> '0',
				'emp_fecha_reg'	=> date('Y-m-d H:i:s')
			);
		}
		//$userid = $this->userid;
		
		$usuario_res = $this->db->insert('ex_empleados', $detalles);
		$usuario_id = $this->db->insert_id();

		return $usuario_id;
	}

	public function usuario($id=0){ # METODO PARA EXTRAER LOS USUARIOS 
		$this->db->select("*");
		$this->db->where('EMP.emp_deleted = 2');
		$this->db->from('ex_empleados as EMP');
		return $this->db->get()->result();
	}

	function personal_permisos_custom(){
		$id_personal = $this->input->post('perid');
		//$userid = $this->userid;

		//START LOG DE REGISTRO
		#$custom_rol = array();		
		$custom_rol = array(
			'exlog_menu' 		=> $this->input->post('exlog_menu'),
			'exlog_gerencia' 	=> $this->input->post('exlog_gerencia'),
			'exlog_jefatura' 	=> $this->input->post('exlog_jefatura'),
			'exlog_controller'	=> $this->input->post('exlog_controller'),
			'exlog_supervisor' 	=> $this->input->post('exlog_supervisor'),
			'exlog_colaborador' => $this->input->post('exlog_colaborador'),
			'exlog_cliente' 	=> $this->input->post('exlog_cliente'),
			'ex_cliente_modo' 	=> $this->input->post('ex_cliente_modo'),
			'ex_clientes' 		=> $this->input->post('ex_clientes'),
			//'ex_sede_modo' 		=> $this->input->post('ex_sede_modo'),
			//'ex_sedes' 			=> $this->input->post('ex_sedes'),
		);

		$serialized_rol=serialize($custom_rol);

		$detalles = array(
			'emp_rol_personalizado' => $serialized_rol,
		);
		
		$this->db->update('ex_empleados',$detalles,array('idempleado' => $id_personal));
		
		return $id_personal;
	}

	function edit_usuario(){
		$id_personal = $this->input->post('perid');
		$pwd = $this->input->post('txtUpdPassword');
		if (empty($pwd)) {
			$detalles = array(
				'emp_nombres' 				=> $this->input->post('txtUpdNombres'),
				'emp_apellidop' 			=> $this->input->post('txtUpdApPaterno'),
				'emp_apellidom' 			=> $this->input->post('txtUpdApMaterno'),
				'emp_tel_celular' 			=> $this->input->post('txtUpdTelefono'),
				'emp_numdoc' 				=> $this->input->post('txtUpdNDocumento'),
				'emp_correo_personal' 		=> $this->input->post('txtUpdEmailPersonal'),
				'emp_correo_corporativo' 	=> $this->input->post('txtUpdEmailCoorporativo'),
				//'password' 					=> $this->input->post('txtUpdPassword'),
				'emp_estado' 				=> $this->input->post('txtUpdEstado'),
			);
		}else{
			$detalles = array(
				'emp_nombres' 				=> $this->input->post('txtUpdNombres'),
				'emp_apellidop' 			=> $this->input->post('txtUpdApPaterno'),
				'emp_apellidom' 			=> $this->input->post('txtUpdApMaterno'),
				'emp_tel_celular' 			=> $this->input->post('txtUpdTelefono'),
				'emp_numdoc' 				=> $this->input->post('txtUpdNDocumento'),
				'emp_correo_personal' 		=> $this->input->post('txtUpdEmailPersonal'),
				'emp_correo_corporativo' 	=> $this->input->post('txtUpdEmailCoorporativo'),
				'password' 					=> md5($pwd),# base64_encode($pwd),
				'emp_estado' 				=> $this->input->post('txtUpdEstado'),
			);
		}
		
		$this->db->update('ex_empleados',$detalles,array('idempleado' => $id_personal));
		
		return $id_personal;
	}

	public function allusuario($id=0){ # METODO PARA EXTRAER LOS USUARIOS 
		$this->db->select("*");
		$this->db->where('emp.is_admin = 0 AND emp.is_developer = 0 AND emp.emp_deleted = 0');
		//$this->db->where('EMP.emp_deleted = 2');
		$this->db->from('ex_empleados as emp');
		return $this->db->get()->result();
	}
}
/*a:10:{
	s:10:"exlog_menu";s:3:"yes";
	s:14:"exlog_gerencia";s:3:"all";
	s:14:"exlog_jefatura";N;
	s:16:"exlog_supervisor";N;
	s:17:"exlog_colaborador";N;
	s:13:"exlog_cliente";N;
	s:15:"ex_cliente_modo";s:3:"all";
	s:11:"ex_clientes";a:1:{i:0;s:1:"2";}
	s:12:"ex_sede_modo";s:6:"custom";
	s:8:"ex_sedes";a:1:{i:0;s:1:"4";}}*/