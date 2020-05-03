<?php 

define ('DEBUG','1');

function Connect()
{

	$mysqli = new mysqli(dbHOST,dbUSER,dbPASSWD,dbBDD);
	if ($mysqli->connect_errno) {
	    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	return $mysqli;

}

function Disconnect($mysqli)
{
	mysqli_close($mysqli);
}

function LoadAll($table, $filtre='', $tri='', $nb = 0, $p = 1)
{

	$con = Connect();
	
	$query = ' SELECT * ' .
		' FROM ' . $table ;
	if (!empty($filtre)) {
		$query .= ' WHERE ' . $filtre;
	}
	if (!empty($tri)) {
		$query .= ' ORDER BY ' . $tri;
	}
	
	if ($nb > 0) $query .= " LIMIT " . $nb * ($p - 1) . ", " . $nb;
	
	$result = $con->query($query);
	
	Disconnect($con);

	showLog('database.php','LoadAll',$query);

	return $result;
	
}

function LoadOne($table,$column,$value)
{
	return LoadAll($table,$column . "=" . $value);		
}

//***************************************
// AlreadyGet - 2019
//***************************************
function AlreadyExist($table, $column, $value)
{

	$con = Connect();
	$query = "SELECT * FROM " . $table . " WHERE " . $column . " = '" . $value . "'";
	$result = ExecuteQuery($query);
	$nbresults = mysqli_num_rows($result);
	Disconnect($con);
	return $nbresults > 0;
		
}

//***************************************
// ExecuteQuery - 2019
//***************************************
function ExecuteQuery($query){

	global $showRequest;

	$con = Connect();

	showLog('db.php','ExecuteQuery',$query);

	$result = $con->query($query);

	if ($showRequest) {
		print_r($query);
		if (!$result){
			print '<br/><br/>ERROR<hr/>';
		}else{
			print '<br/><br/>OK<hr/>';
		}
	}

	Disconnect($con);
	return $result;

}

function addQueryCondition(&$sql,$condition){
	if ($sql != '') $sql .= ' AND ';
	$sql .= mysql_real_escape_string($condition);
}

function tableExist($tableName){
	
	// Select 1 from table_name will return false if the table does not exist.
	$result = ExecuteQuery('select 1 from ' . $tableName . ' LIMIT 1');
	return $result !== FALSE;

}

function columnExist($table, $column){
	$result = ExecuteQuery("SHOW COLUMNS FROM " . $table . " LIKE '" . $column . "'");
	return (mysqli_num_rows($result))?TRUE:FALSE;
}

?>