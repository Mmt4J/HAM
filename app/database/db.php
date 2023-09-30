<?php
session_start();

require ('connect.php');

function dd($value){
	echo "<pre>", print_r($value, true), "</pre>";	
	die();
}

// Encode urlID
function id_encode($data)
{
	$b64 = base64_encode($data);
  	if ($b64 === false) {
    return false;
  }
  $url = strtr($b64, '+/', '-_');
  return rtrim($url, '=');
}

// Decode urlID
function id_decode($data, $strict = false)
{
  $b64 = strtr($data, '-_', '+/');
  return base64_decode($b64, $strict);
}


function executeQuery($sql, $data)
{
	global $conn;
	$stmt = $conn->prepare($sql);
	$values = array_values($data);
	$types = str_repeat('s', count($values));
	$stmt->bind_param($types, ...$values);
	$stmt->execute();
	return $stmt;
}

// Select all records || Based on conditions
function selectAll($table, $conditions=[])
{
	global $conn;
	$sql = "SELECT * FROM $table";
	if(empty($conditions)){
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
	}else{
		$i=0;
		foreach($conditions as $key => $value){
			if($i === 0){
				$sql = $sql . " WHERE $key = ?";
			}else{
				$sql = $sql . " AND $key = ?";
			}
			$i++;
		}
		$stmt = executeQuery($sql, $conditions);
		$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
	}
}


//Select one record function
function selectOne($table, $conditions)
{
	global $conn;
	$sql = "SELECT * FROM $table";
	$i=0;
	foreach($conditions as $key => $value){
		
		if($i === 0){
			$sql = $sql . " WHERE $key = ?";
		}else{
			$sql = $sql . " AND $key = ?";
		}
		$i++;
	}
	$sql = $sql . " LIMIT 1";
	$stmt = executeQuery($sql, $conditions);
	$records = $stmt->get_result()->fetch_assoc();
	return $records;
}

//Create function
function create($table, $data)
{
	global $conn;
	//INSERT INTO users SET username=?, admin=?, email=?, password=?
	$sql = "INSERT INTO $table SET ";
	$i=0;
	foreach($data as $key => $value){
		if($i === 0){
			$sql = $sql . " $key = ?";
		}else{
			$sql = $sql . ", $key = ?";
		}
		$i++;
	}
	$stmt = executeQuery($sql, $data);
	$id = $stmt->insert_id;
	return $id;
}

//Update functions
function update($table, $id, $data)
{
	global $conn;
	//UPDATE users SET username=?, admin=?, email=?, password=? WHERE id =?
	$sql = "UPDATE $table SET ";
	$i=0;
	foreach($data as $key => $value){
		if($i === 0){
			$sql = $sql . " $key = ?";
		}else{
			$sql = $sql . ", $key = ?";
		}
		$i++;
	}
	$sql = $sql . " WHERE id = ?";
	$data['id'] = $id;
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;
}


//Delete functions
function delete($table, $id)
{
	global $conn;
	//DELETE FROM users WHERE id =?
	$sql = "DELETE FROM $table WHERE id =? ";
	$stmt = executeQuery($sql, ['id'=>$id]); //Our execute function only recieve assoc array
	return $stmt->affected_rows;
}


function randomRecord($table)
{
	global $conn;

	$sql = "SELECT * FROM $table ORDER BY RAND() LIMIT 1";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
	}
	return $row;
}

// function numberOfRows($table, )
// {
// 	global $conn;

// 	$sql = "SELECT * FROM $table ORDER BY RAND() LIMIT $";
// 	$result = $conn->query($sql);
// 	if($result->num_rows > 0){
// 		$row = $result->fetch_assoc();
// 	}
// 	return $row;
// }


function selectRandomRecord($table, $conditions)
{
	global $conn;
	$sql = "SELECT * FROM $table";
	$i=0;
	foreach($conditions as $key => $value){
		
		if($i === 0){
			$sql = $sql . " WHERE $key = ?";
		}else{
			$sql = $sql . " AND $key = ?";
		}
		$i++;
	}
	$sql = $sql . " ORDER BY RAND() LIMIT 1";
	$stmt = executeQuery($sql, $conditions);
	$records = $stmt->get_result()->fetch_assoc();
	return $records;
}


function sumColumn($table, $column){

	global$conn;
	$sql = "SELECT SUM($column) AS total FROM $table";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$sum = $row['total'];
	return $sum;
}