<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Template {

	public function render($view, $data = array()) {
		$ci = get_instance();

		$view_data['content_view'] = $view;
		
		$view_data['left_menu_movil'] = "layout/includes/left_menu_movil";
		$view_data['menu'] = "layout/includes/menu";
		$view_data['topbar'] = "layout/includes/topbar";
		$view_data['message_intro'] = "";
		$view_data['search'] = "layout/includes/search";
		$view_data['extras'] = "layout/includes/extras";

		$view_data = array_merge($view_data, $data);
		
		$ci->load->view('layout/index', $view_data);
	}

}