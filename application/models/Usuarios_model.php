<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $table = null;

	function __construct()
	{
		#parent:: __construct();
		$this->table = 'config_usuario';
		parent::__construct($this->table);
	}

	var $tbuser = "config_usuario as emp";
	//var $order_column = array(null, null, "emp_correo_corporativo", "emp_numdoc", null); 

	//########## END LISTA
	function authenticate($txtndoc, $password) {
		$this->db->select("*");
		$result = $this->db->get_where($this->table, array('USU_USUARIO' => $txtndoc, 'USU_CLAVE' => $password, 'USU_ESTADO' => 1));
		if ($result->num_rows() == 1) {
			$user_info = $result->row();
			$this->session->set_userdata('user_id', $user_info->PK_USU_CODI);
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
		$this->db->from('config_usuario usu');
		$this->db->join('config_persona per','usu.PK_USU_CODI = per.FK_USU_CODI');
		$this->db->where('usu.PK_USU_CODI = "'.$id.'"');
		return $this->db->get()->row();
	}


	function get_access_info($user_id = 0) {
		$sql = "SELECT * 
		FROM config_usuario usu
		INNER JOIN config_persona per ON usu.PK_USU_CODI = per.FK_USU_CODI
		WHERE usu.USU_ESTADO = 1 and usu.PK_USU_CODI = $user_id";

		/*SELECT * FROM config_usuario AS emp

		#LEFT JOIN gb_roles AS rol ON rol.idrol = emp.idrol AND rol.rol_deleted <> 1
		WHERE emp.PK_USU_CODI = $user_id";*/
		return $this->db->query($sql)->row();
	}

	public function add_usuario(){ # METODO PARA GUARDAR LA NUEVA EMPRESA
		$tdoc = $this->input->post('mtxtTipoDoc');	
		$apellidos = $this->input->post('mtxtAddApPaterno').' '.$this->input->post('mtxtAddApMaterno');

		$det_usu = array(
			'USU_USUARIO' 	=> $this->input->post('txtDocumento'),
			'USU_CLAVE' 	=> $this->input->post('txtDocumento'),			
			'USU_ESTADO' 	=> '1',
		);			

		$usuario_res = $this->db->insert('config_usuario', $det_usu);
		$usuario_id = $this->db->insert_id();

		if ($tdoc == '1' || $tdoc == '3') {
			$detalles = array(
				'PER_TIPO_DOC'	=> $tdoc,
				'PER_DOC' 		=> $this->input->post('txtDocumento'),
				'PER_APELLIDO' 	=> $apellidos,
				'PER_NOMBRE' 	=> $this->input->post('mtxtAddNombres'),				
				'FK_USU_CODI'   => $usuario_id,				
			);
		}elseif ($tdoc == '2') {
			$detalles = array(
				'PER_TIPO_DOC'	=> $tdoc,
				'PER_DOC' 		=> $this->input->post('txtDocumento'),
				'PER_NOMBRE' 	=> $this->input->post('mtxtAddANomRS'),				
				'FK_USU_CODI'   => $usuario_id,	
			);
		}

		$persona_res = $this->db->insert('config_persona', $detalles);
		$persona_id = $this->db->insert_id();

		return $usuario_id;
	}

	public function usuario($id=0){ # METODO PARA EXTRAER LOS USUARIOS 
		$this->db->select("*");
		//$this->db->where('EMP.emp_deleted = 2');
		$this->db->from('config_usuario as EMP');
		return $this->db->get()->result();
	}

	function personal_permisos_custom(){
		$id_personal = $this->input->post('perid');
	
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

			'exlog_menu_gedoc' 		=> $this->input->post('exlog_menu_gedoc'),
			'exlog_gedoc' 		=> $this->input->post('exlog_gedoc'),
			'ex_ge_doc' 		=> $this->input->post('ex_ge_doc'),
		);

		$serialized_rol=serialize($custom_rol);

		$detalles = array(
			'EMP_ROL_PERSONALIZADO' => $serialized_rol,
		);
		
		$this->db->update('config_usuario',$detalles,array('PK_USU_CODI' => $id_personal));
		
		return $id_personal;
	}

	function edit_usuario(){
		$id_personal = $this->input->post('perid');
		$detalles_persona = array(
			'PER_DOC' 		=> $this->input->post('txtUpdNDocumento'),
			'PER_APELLIDO' 	=> $this->input->post('txtUpdApellido'),
			'PER_NOMBRE' 	=> $this->input->post('txtUpdNombres'),				
			'PER_TELEF' 	=> $this->input->post('txtUpdTelefono'),				
		);

		$this->db->update('config_persona',$detalles_persona ,array('FK_USU_CODI' => $id_personal));

		$pwd = $this->input->post('txtUpdPassword');
		if (empty($pwd)) {
			$detalles = array(
				'USU_CLAVE' 	=> $pwd,
				'USU_ESTADO' 	=> $this->input->post('txtUpdEstado')
			);
		}else{
			$detalles = array(
				'USU_CLAVE' 	=> $pwd,
				'USU_ESTADO' 	=> $this->input->post('txtUpdEstado')
			);
		}
		
		$this->db->update('config_usuario',$detalles,array('PK_USU_CODI' => $id_personal));		
		return $id_personal;
	}

	public function allusuario($id=0){ # METODO PARA EXTRAER LOS USUARIOS 
		$this->db->select("*");
		$this->db->from('config_usuario usu ');
		$this->db->join('config_persona per','usu.PK_USU_CODI = per.FK_USU_CODI');
		$this->db->where('usu.IS_DEVELOPER <> 1');
		//$this->db->where('EMP.emp_deleted = 2');
		
		return $this->db->get()->result();
	}

	public function config_usuarios($id=0){
		$this->db->select('*');
		$this->db->from('config_persona');
		$this->db->where('PER_CARGO = '.$id);
		return $this->db->get()->result();
	}
}
