<?php
//this file is controller_ajax_calls_model.php.  It is called by view.html.  It in turn calls model.php

class CalculateEarnings {
    

    //the constructor    
    public function __construct() {}

    public function callCaesar()
    {
  		        
	    $var = $_GET['name'];


		$search = stripslashes($var);  // eliminated quotes	
		$pieces = explode("=", $search);  // split up key, value pair to get the value
		
		$pieces1 = explode("%3D", $pieces[1]);  // split up to remove extra encoding %3D
		
		$value = $pieces1[0];  // the value
		$shift = $pieces[2];   // the shift
		
		$pvalue = urldecode($pvalue);
		//$pvalue = preg_replace("/([\\x00-\\x20])/e", "_", $pvalue);
		
		//the algorithm for the doCaeser method was adapted from:
		//http://www.xarg.org/2010/05/cracking-a-caesar-cipher/ 
		function doCaesar($pvalue, $pshift) {
		   
		   $str = $pvalue;   //"String to loop through";
		   $n = $pshift;
		   $ret = "";
		   for($i = 0, $l = strlen($str); $i < $l; ++$i) {
			   $c = ord($str[$i]);
			   if (97 <= $c && $c < 123) {
				   $ret.= chr(($c + $n + 7) % 26 + 97);
			   } else if(65 <= $c && $c < 91) {
				   $ret.= chr(($c + $n + 13) % 26 + 65);
			   } else {
				   $ret.= $str[$i];
			   }
		   }
		 echo urldecode($ret);	
		}

		$searchstring = $pieces[0];
		$pos1 = strpos($name, $searchstring);
  
		// Note the use of ===.  Simply == would not work as expected
		// because the positional issues of the 0th (first) character per api documentation. 
		//if ($pos1 !== false) 
		if($value !== false)
		{
			if(!"GET")
			{
			  // do nothing. prevents caling the controller prematurely, which could in some cases lead to division by zero!
			  return 1;	
			}else{
			 // ensure the controller is only called on GET
			 doCaesar($value, $shift );
			}   
		}	
		return 0;
		
     } //end callCaesar method

} // end controller class

  //instantiate the CalculateEarnings controller class
  $workhorse=new CalculateEarnings();
  //then call the method
  $ret = $workhorse->callCaesar();
  if($ret === 1){
    //$workhorse->redirect("http://localhost/earnings_code_challenge");
    echo '{module:controller, success: false}';
  }
  

?>