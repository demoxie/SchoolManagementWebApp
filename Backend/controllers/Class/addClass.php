<?php
require_once("../../../Backend/server/connection.php");
$dateadded = date("Y-m-d h:i:sa");


function random_num($size) {
	$alpha_key = '';
	$keys = range('A', 'Z');
	
	for ($i = 0; $i < 2; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
	}
	
	$length = $size - 2;
	
	$key = '';
	$keys = range(0, 9);
	
	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
	
	return $alpha_key . $key;
}



try{
$classid=random_num(5);
        $stmt = $conn->prepare( 'INSERT INTO `class`(`ClassID`, `ClassName`, `FormMaster`, `ClassRep`, `Population`, `DateAdded`) VALUES (:classid,:classname,:formmaster,:classrep,:population,:dateadded)');
        $stmt->bindParam( ':classid', $classid );
        $stmt->bindParam( ':classname', $_POST['classname'] );
        $stmt->bindParam( ':formmaster', $_POST['formmaster'] );
        $stmt->bindParam( ':classrep', $_POST['classrep'] );
        $stmt->bindParam( ':population', $_POST['population'] );
        $stmt->bindParam( ':dateadded', $dateadded);
        
        $stmt->execute();
         $alert = array( 'alert' => 'Success!', 'status' => 'alert alert-success', 'message' => 'New Class Added Successfully.' );
        print_r ( json_encode( $alert ) );
        

    } catch( PDOException $e ) {
    $alert = array( 'alert' => 'Error!', 'status' => 'alert alert-danger', 'message' => 'Could not prepare/execute query: '.$e->getMessage() );
        print_r ( json_encode( $alert ) );
   }

// Close statement
unset( $stmt );

// Close connection
unset( $conn );

?>