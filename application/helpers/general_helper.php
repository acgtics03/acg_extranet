<?php

/**
 * use this to print link location
 *
 * @param string $uri
 * @return print url
 */
if (!function_exists('echo_uri')) {

	function echo_uri($uri = "") {
		echo get_uri($uri);
	}

}

/**
 * prepare uri
 * 
 * @param string $uri
 * @return full url 
 */
if (!function_exists('get_uri')) {

	function get_uri($uri = "") {
		$ci = get_instance();
		$index_page = $ci->config->item('index_page');
		return base_url($index_page . '/' . $uri);
	}

}

/**
 * use this to print file path
 * 
 * @param string $uri
 * @return full url of the given file path
 */
if (!function_exists('get_file_uri')) {

	function get_file_uri($uri = "") {
		return base_url($uri);
	}

}

/**
 * get the url of user avatar
 * 
 * @param string $image_name
 * @return url of the avatar of given image reference
 */
if (!function_exists('get_avatar')) {

	function get_avatar($image_name = "") {
		if ($image_name === "system_bot") {
			return base_url("assets/images/avatar-bot.jpg");
		} else if ($image_name) {
			return base_url(get_setting("profile_image_path")) . "/" . $image_name;
		} else {
			return base_url("assets/images/avatar.jpg");
		}
	}

}

/**
 * link the css files 
 * 
 * @param array $array
 * @return print css links
 */
if (!function_exists('load_css')) {

	function load_css(array $array) {
		foreach ($array as $uri) {
			echo "<link rel='stylesheet' type='text/css' href='" . base_url($uri) . "' />";
		}
	}

}


/**
 * link the javascript files 
 * 
 * @param array $array
 * @return print js links
 */
if (!function_exists('load_js')) {

	function load_js(array $array) {
		foreach ($array as $uri) {
			echo "<script type='text/javascript'  src='" . base_url($uri) . "'></script>";
		}
	}

}

/**
 * check the array key and return the value 
 * 
 * @param array $array
 * @return extract array value safely
 */
if (!function_exists('get_array_value')) {

	function get_array_value(array $array, $key) {
		if (array_key_exists($key, $array)) {
			return $array[$key];
		}
	}

}