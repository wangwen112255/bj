<?php 

namespace Org\ThinkSDK\go;
// use Org\ThinkSDK;
use Org\ThinkSDK\Mings;
/**
* 
*/
// require_once("");
include "Mings.class.php";

class Min extends Mings{

	
	function __construct()
	{
		parent::__construct();
		# code...
	}


	public function min(){
		echo "这是扩展";
	}
}


 ?>
