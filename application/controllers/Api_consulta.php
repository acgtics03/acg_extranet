<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_consulta extends MY_Controller {
	
	private $ncompleto = null;

	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	function consultaRUC($nro=0){

		// Datos
		$token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
		//$ruc = '10482861828';

		// Iniciar llamada a API
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $nro,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Referer: http://apis.net.pe/api-ruc',
		    'Authorization: Bearer ' . $token
		  ),
		));

		$result = curl_exec($curl);
		$err = curl_error($curl);


		if($err) {
			echo 'Curl Error: ' . $err;
		} else {
			$response = json_decode($result, true);
			$detalles= array();
			$detalles['rs']=$response['nombre'];
			$detalles['estado']=$response['estado'];
			$detalles['condicion']=$response['condicion'];
			$detalles['direccion']=$response['direccion'];
			$detalles['ubigeo']=$response['departamento'].' / '.$response['provincia'].' / '.$response['distrito'];
			echo json_encode($detalles);
		}
	}

	function consultaDNI($nro=0){

		// Datos
		$token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
		//$dni = '48089945';

		// Iniciar llamada a API
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $nro,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Referer: http://apis.net.pe/api-ruc',
		    'Authorization: Bearer ' . $token
		  ),
		));

		$result = curl_exec($curl);
		$err = curl_error($curl);


		if($err) {
			echo 'Curl Error: ' . $err;
		} else {
			$response = json_decode($result, true);
			$detalles= array();
			$detalles['apPaterno']=$response['apellidoPaterno'];
			$detalles['apMaterno']=$response['apellidoMaterno'];
			$detalles['nombres']=$response['nombres'];
			echo json_encode($detalles);
		}
	}


	function login($nro=0){

		// Datos
		//$token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
		//$dni = '48089945';

		// Iniciar llamada a API
		$curl = curl_init();

		curl_setopt_array($curl, array(
		 // CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $nro,
			CURLOPT_URL => 'localhost/pventa/api/login?username=admin&pwd=123',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		     'X-API-KEY: USERADMIN1',
		  ),
		));

		$result = curl_exec($curl);
		$err = curl_error($curl);

		echo $result;
	}
}