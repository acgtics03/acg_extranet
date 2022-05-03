<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 *  ============================================================================== 
 *  Autor	: Michael Flores C
 *  Email	: ing.sisfcca@gamil.com
 *  For		: Google Drive
 *  ============================================================================== 
 */
/*require_once APPPATH . "/third_party/api-google/vendor/autoload.php";

class Api_google extends Apigoogle\Apigoogle
{
	public function __construct()
	{
		parent::__construct();
	}
}*/

    require_once APPPATH ."/third_party/api-google/vendor/autoload.php";
     
    class Drive extends autoload {
        public function __construct(){
            parent::__construct(); 
        }
    }