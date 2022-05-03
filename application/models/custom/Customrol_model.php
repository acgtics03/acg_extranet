<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customrol_model extends CI_Model {

	private $userid = null;
	function __construct()
	{
		parent:: __construct();
	}


	/*function access_all() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "exlog_menu") == "yes") {
			return true;
			//echo 'Hola;'
		}
	}

	function access_cliente() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "exlog_cliente") == "all") {
			return true;
		}
	}*/


	/*function access_all() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "rol_permisos") == "yes") {
			return true;
		}
	}
	function access_supervisor() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "supervisor") == "yes") {
			return true;
		}
	}
	function access_jefatura() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "colaborador") == "yes") {
			return true;
		}
	}
	function access_cliente() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "cliente") == "yes") {
			return true;
		}
	}*/

	##############################################################################################################
	# PERMISOS - ALMACEN LOGISTICA
	##############################################################################################################

	/*function alm_menu() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "exlog_menu") == "yes") {
			return true;
		}
	}*/
	function ex_gerencia() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "exlog_gerencia") == "all") {
			return true;
		}
	}

	function ex_jefatura() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "ex_jefatura") == "all") {
			return true;
		}
	}

	function ex_controller() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "ex_controller") == "all") {
			return true;
		}
	}

	function exlog_supervisor() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "exlog_supervisor") == "all") {
			return true;
		}
	}

	function exlog_colaborador() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "exlog_colaborador") == "all") {
			return true;
		}
	}

	function exlog_cliente() {
		if ($this->login_user->IS_DEVELOPER || get_array_value($this->login_user->rol_permisos, "exlog_cliente") == "all") {
			return true;
		}
	}
	
	function alm_clientes() {
		return get_array_value($this->login_user->rol_permisos, "ex_clientes");
	}

	function alm_cliente_modo() {
		return get_array_value($this->login_user->rol_permisos, "ex_cliente_modo");
	}

	/*function alm_asistente() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "alm_asistente") == "yes") {
			return true;
		}
	}
	function alm_coordinador() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "alm_coordinador") == "yes") {
			return true;
		}
	}
	function alm_analista_proy() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "alm_analista_proy") == "yes") {
			return true;
		}
	}
	function alm_analista_alm() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "alm_analista_alm") == "yes") {
			return true;
		}
    }
    function alm_encargado_alm() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "alm_encargado_alm") == "yes") {
			return true;
		}
	}
	function alm_cliente_modo() {

		return get_array_value($this->login_user->rol_permisos, "alm_cliente_modo");
	}
    function alm_clientes() {

		return get_array_value($this->login_user->rol_permisos, "alm_clientes");
	}
	function alm_almacen_modo() {

		return get_array_value($this->login_user->rol_permisos, "alm_almacen_modo");
	}
    function alm_almacenes() {
		
		return get_array_value($this->login_user->rol_permisos, "alm_almacenes");
	}
	function alm_reporte_gg() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "alm_reporte_gg") == "yes") {
			return true;
		}
	}
	function alm_listado_sp() {
		if ($this->login_user->is_admin || get_array_value($this->login_user->rol_permisos, "alm_listado_sp") == "yes") {
			return true;
		}
	}*/


}