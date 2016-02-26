<?php
//model.php
//called by controller_ajax_calls_model.php and echoes back to controller_ajax_calls_model.php


$name = cleanGet($_GET);

$values = explode("%3D", $name[1]);  // split up to remove extra encoding %3D
		
$name = $values[0];  // the value
$shift = substr($values[1], -1);  // the shift
		
				  
//echo "Search Results: Value = $name, Shift = $shift <br>";
//exit;

// eliminates quotes from passed parameters
function cleanGet($_GET)
{
  if(isset($_GET['name']))
  {
      $var = $_GET['name'];
  }else{
    //die
    echo "Invalid data received";
    return 1;
  }
  
  
  $dirty = stripslashes($var);

  $pieces = explode("=", $dirty);

  //$pieces = explode("=", stripslashes($var));  //doesn't work
    
  return $pieces;
}

/*
	    $var = $_GET['name'];
		//print_r($var);

		$search = stripslashes($var);  // eliminated quotes	
		$pieces = explode("=", $search);  // split up key, value pair to get the value
		
		$pieces1 = explode("%3D", $pieces[1]);  // split up to remove extra encoding %3D
		
		$name = $pieces1[0];  // the value
		$shift = substr($pieces[1], -1);  // the shift
	    
	    echo "Params are name: " . $value . " shift: " . $shift . "<br>";
		exit;
		
*/
//windows bug fix
//$name = $clean;

// this model class handles data processing
class ModelClass {  

    // initialize the variables/properties
    private $imput = '';
    private $theshift = '';
    private $response;
    private $url = "http://localhost/earnings_code_challenge/view.php";
    //private $totalrows = 0;

    //the constructor    
    public function __construct() {}

    public function internalClean($_GET)  // this method cleans $_GET
    {
      $values = explode("%3D", $_GET['name']);  // split up to remove extra encoding %3D
      
      $stone = explode("&", $values[0]);
      $thedirtyval = $stone[0];
      $theshifty = $stone[1];
      
      $thedirtyval = explode("=", $thedirtyval);            
      $cleanval = explode("%20", $thedirtyval[1]);
      	  
	  //$cleanval = implode(" ", $cleanval);
	  $cleanval =  urldecod($cleanval) ;//= implode(" ", $cleanval);
	  
      //echo '{dirtyval: ' . $cleanval . ' ' . $theshifty . ' }';
      		
	   $this->input = $cleanval; //$values[0];  // the value
	   $this->theshift = $theshifty; //substr($values[1], -1);  // the shift
		
	   $array = array($this->input, $this->theshift);
		
	    return $array;     
    }
    
    public function encodeCaesarCipher($val, $n){
    
    //echo $val . " ..... " . $n;
    
    //exit;
    

	   //$str = "String to loop through";

	  $str = $val;   //"String to loop through";
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
	return $ret;            
}
    
    

    
} //end of model

// cleans and tests input for correctness   
function test_input($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

 
if (isset($name))
{
  //instantiate the CalculateEarnings controller class
  $workhorse=new ModelClass();
  
  list($one, $two) = $workhorse->internalClean($_GET);  //process the data
  
  //print_r($one);
  //echo $two;
  
  $value = $one;  //explode("=", $one);
  $two = explode("=", $two);
  //print_r($two);
  //exit;
  
  $shifter = $two[1];  //$oner[1];

  
//  echo "<br>";
  
  //echo "Partnership : " . $value . " -- " . $shifter;
  
   $ret = $workhorse->encodeCaesarCipher($one, $shifter);  //process the data
  
  //echo "Let us see -->" . $one; //. "<br>" . $two . "<br>" . $three;
  
  //echo "Getting " . $ret . "<br>";
  
  //exit;
  
  //return final status
  if($ret === 0){
    echo "{module:model, message:No data found, the program, success: false}";
  }else{
     //echo "{module:model, success: true}"; //for testing only.  The user should not see this
  }

}




?>