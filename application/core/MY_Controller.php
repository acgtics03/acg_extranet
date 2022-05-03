<?php

class MY_Controller extends CI_Controller {

	public $login_user;
	protected $access_type = "";
	protected $allowed_members = array();
	protected $allowed_ticket_types = array();
	protected $module_group = "";

	function __construct() {
		parent::__construct();

		$CI =& get_instance();
		$CI->load->model("Usuarios_model");

		# Verifique el estado de inicio de sesión de los usuarios, si no ha iniciado sesión redirigir a la página de inicio de sesión
		$login_user_id = $this->Usuarios_model->login_user_id();
		if (!$login_user_id) {
			$uri_string = uri_string();
			
			if (!$uri_string || $uri_string === "login") {
				redirect('login');
			} else {
				redirect('login?redirect=' . get_uri($uri_string));
			}
		}

		# Iniciar la información requerida de los usuarios de inicio de sesión
		$this->login_user = $this->Usuarios_model->get_access_info($login_user_id);

		# Inicializar los permisos de acceso de los usuarios de inicio de sesión
		if ($this->login_user->EMP_ROL_PERSONALIZADO) {

			if($this->login_user->EMP_ROL_PERSONALIZADO){
				$permisos = unserialize($this->login_user->EMP_ROL_PERSONALIZADO);
			}			
			$this->login_user->rol_permisos = is_array($permisos) ? $permisos : array();

		} else {
			$this->login_user->rol_permisos = array();
		}
	}

	# Inicializar los permisos del usuario de inicio de sesión con formato legible.
	protected function init_permission_checker($module) {
		$info = $this->get_access_info($module);
		$this->access_type = $info->access_type;
		$this->allowed_members = $info->allowed_members;
		$this->allowed_ticket_types = $info->allowed_ticket_types;
		$this->module_group = $info->module_group;
	}

	# Preparar los permisos de inicio de sesión de los usuarios
	protected function get_access_info($group) {
		$info = new stdClass();
		$info->access_type = "";
		$info->allowed_members = array();
		$info->allowed_ticket_types = array();
		$info->module_group = $group;

		//admin users has access to everything
		if ($this->login_user->is_admin) {
			$info->access_type = "all";
		} else {

			//not an admin user? check module wise access permissions
			$module_permission = get_array_value($this->login_user->rol_permisos, $group);

			if ($module_permission === "all") {
				//this user's has permission to access/manage everything of this module (same as admin)
				$info->access_type = "all";
			}/* else if ($module_permission === "specific") {
				//this user's has permission to access/manage sepcific items of this module

				$info->access_type = "specific";
				$module_permission = get_array_value($this->login_user->permissions, $group . "_specific");
				$permissions = explode(",", $module_permission);

				//check the accessable users list
				if ($group === "leave" || $group === "attendance" || $group === "team_member_update_permission" || $group === "timesheet_manage_permission") {
					$info->allowed_members = array($this->login_user->id);
					$allowed_teams = array();
					foreach ($permissions as $vlaue) {
						$permission_on = explode(":", $vlaue);
						$type = get_array_value($permission_on, "0");
						$type_value = get_array_value($permission_on, "1");
						if ($type === "member") {
							array_push($info->allowed_members, $type_value);
						} else if ($type === "team") {
							array_push($allowed_teams, $type_value);
						}
					}


					if (count($allowed_teams)) {
						$team = $this->Team_model->get_members($allowed_teams)->result();

						foreach ($team as $value) {
							if ($value->members) {
								$members_array = explode(",", $value->members);
								$info->allowed_members = array_merge($info->allowed_members, $members_array);
							}
						}
					}
				} else if ($group === "ticket") {
					//check the accessable ticket types
					$info->allowed_ticket_types = $permissions;
				}
			}*/
		}
		return $info;
	}

	# Acceso solo permitido a miembros del equipo
	protected function access_only_allowed_members() {
		if ($this->access_type === "all") {
			return true; //can access if user has permission
		} else if ($this->module_group === "ticket" && $this->access_type === "specific") {
			return true; //can access if it's tickets module and user has a pertial access
		} else {
			redirect("forbidden");
		}
	}

}