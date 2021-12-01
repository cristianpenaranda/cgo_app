<?php 
	
	//adding dboperation file 
	require_once '../DbOperation.php';
	
	//response array 
	$response = array(); 

	if (empty($_POST['terminal']) && empty($_POST['regional'])) {
      $response['error'] = true; 
      $response['message'] = 'Campos Vacios al enviar los datos';
   } else {      
      if (isset($_POST['terminal']) && isset($_POST['regional'])) {
         $db = new DbOperation(); 
         $consulta = $db->consultarTerminal($_POST['terminal']);
         if(count($consulta)<=0){
            $registro = $db->registrarTerminal($_POST['terminal'],$_POST['regional']);
            if($registro){
               $response['error'] = false;
               $response['message'] = 'Terminal registrada exitosamente';
            }else{
               $response['error'] = true;
               $response['message'] = 'La terminal ya está registrada';
            }
         }else{
            $response['error'] = true;
            $response['message'] = 'La terminal ya está registrada';
         }	
      }else{
         $response['error'] = false; 
         $response['message'] = 'Invalid Request';
      }    
   }  	
	//displaying the data in json 
   echo json_encode($response);
?>