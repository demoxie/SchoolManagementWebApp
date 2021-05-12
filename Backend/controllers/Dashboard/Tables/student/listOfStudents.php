<?php
public function employeeList(){		
	$sqlQuery = "SELECT * FROM ".$this->empTable." ";
	if(!empty($_POST["search"]["value"])){
		$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
		$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
		$sqlQuery .= ' OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
		$sqlQuery .= ' OR address LIKE "%'.$_POST["search"]["value"].'%" ';
		$sqlQuery .= ' OR skills LIKE "%'.$_POST["search"]["value"].'%") ';			
	}
	if(!empty($_POST["order"])){
		$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	} else {
		$sqlQuery .= 'ORDER BY id DESC ';
	}
	if($_POST["length"] != -1){
		$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}	
	$result = mysqli_query($this->dbConnect, $sqlQuery);

        // Updated for pagination	
        $sqlQuery1 = "SELECT * FROM ".$this->empTable." ";
	$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
	$numRows = mysqli_num_rows($result1);       
        
	$employeeData = array();	
	while( $employee = mysqli_fetch_assoc($result) ) {		
		$empRows = array();			
		$empRows[] = $employee['id'];
		$empRows[] = ucfirst($employee['name']);
		$empRows[] = $employee['age'];		
		$empRows[] = $employee['skills'];	
		$empRows[] = $employee['address'];
		$empRows[] = $employee['designation'];					
		$empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="btn btn-warning btn-xs update">Update</button>';
		$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
		$employeeData[] = $empRows;
	}
	$output = array(
		"draw"				=>	intval($_POST["draw"]),
		"recordsTotal"  	=>  $numRows,
		"recordsFiltered" 	=> 	$numRows,
		"data"    			=> 	$employeeData
	);
	echo json_encode($output);
}

public function addEmployee(){
	$insertQuery = "INSERT INTO ".$this->empTable." (name, age, skills, address, designation) 
		VALUES ('".$_POST["empName"]."', '".$_POST["empAge"]."', '".$_POST["empSkills"]."', '".$_POST["address"]."', '".$_POST["designation"]."')";
	$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
}

public function updateEmployee(){
	if($_POST['empId']) {	
		$updateQuery = "UPDATE ".$this->empTable." 
		SET name = '".$_POST["empName"]."', age = '".$_POST["empAge"]."', skills = '".$_POST["empSkills"]."', address = '".$_POST["address"]."' , designation = '".$_POST["designation"]."'
		WHERE id ='".$_POST["empId"]."'";
		$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
	}	
}
public function deleteEmployee(){
	if($_POST["empId"]) {
		$sqlDelete = "
			DELETE FROM ".$this->empTable."
			WHERE id = '".$_POST["empId"]."'";		
		mysqli_query($this->dbConnect, $sqlDelete);		
	}
}

?>