<?php


//=========== Insert course, ebook and resource into database==========
if (isset($_POST['insert'])) {
	$table = $_POST['insert'];
	if($table == '' ) exit(0);
	//Insert ebook and resource
	if ($table == 'ebook' || $table == 'resource') {
		$semester = $_POST['semester'];
		$code = $_POST['code'];
		$title = $_POST['title'];
		$link = $_POST['link'];
		$semester = intval($semester);

		if ($semester !='' && $code !='' && $title !='' && $link !='') {
			include "../../init/connection.php";
			$stmt = $conn->prepare("INSERT INTO ".$table." (semester, code, title, link) VALUES (?, ?, ?, ?)");
	    	$stmt->bind_param("isss", $semester, $code, $title, $link);
	    	$stmt->execute();
	    	if ($stmt->affected_rows >0) {
	    		echo $conn->insert_id;
	    	}else{
	    		echo '-1';
	    	}
			$stmt->close();
			$conn->close();
		}
	}

	//Insert course
	if ($table == 'course') {

		$code=$_POST['code'];
		$name=$_POST['name'];
		$credit=$_POST['credit'];
		$semester=$_POST['semester'];
		$semester = intval($semester);

		if ($code !='' && $name !='' && $credit !='' && $semester !='') {
			include "../../init/connection.php";
			$stmt = $conn->prepare("INSERT INTO course (code, name, credit, semester) VALUES (?, ?, ?, ?)");
	    	$stmt->bind_param("ssdi", $code, $name, $credit, $semester);
	    	$stmt->execute();
			echo $stmt->affected_rows;
			$stmt->close();
			$conn->close();
		}

	}
}


//================Ebook, resource and course update===============
if (isset($_POST['table'])) {

	$table=$_POST['table'];
	$column=$_POST['column'];
	$editval=$_POST['editval'];
	$id=$_POST['id'];
	if($table == '' || $column == '' || $editval == '' || $id == '') exit(0);
	include "../../init/connection.php";
	$stmt = "UPDATE ".$table." SET ".$column." ='".$editval."'  WHERE id=".$id;
	if ($conn->query($stmt) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	$conn->close();
}


//==============Getting Course details.......show==================
if (isset($_POST['course_details'])) {
	$id=$_POST['course_details'];
	if($id == '') exit(0);
	include "../../init/connection.php";
	$sql = "SELECT * FROM course_details WHERE id = ".$id;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
    		echo $row['details'];
    	}
	} else {
    	echo '-1';
	}
	$conn->close();	
}



//==============Insert and update coursee details into database============
if (isset($_POST['editor'])) {
	$code=$_POST['code'];
	$content=$_POST['editor'];
	include "../../init/connection.php";
	$json = array();
	if ($code =='' || $content == '') {
		echo '-1';
		exit(0);
	}
	$sql = "SELECT * FROM course_details WHERE code = ".$code;
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		
		$stmt = "UPDATE course_details SET details ='".$content."'  WHERE code = '".$code."'";
		if ($conn->query($stmt) === TRUE) {
			$json['type'] = 'update';
	    	$json['success'] = 'yes';
	    	$json['code'] = $code;
			$json['id'] = $conn->insert_id;
			echo json_encode($json);
		} else {
			$json['type'] = 'update';
	    	$json['success'] = 'no';
			echo json_encode($json);
		}
	}else{
		$stmt = $conn->prepare("INSERT INTO course_details (code, details) VALUES (?, ?)");
    	$stmt->bind_param("ss", $code, $content);
    	$stmt->execute();

		if ($stmt->affected_rows >0) {
	    	$json['type'] = 'insert';
	    	$json['success'] = 'yes';
	    	$json['code'] = $code;
			$json['id'] = $conn->insert_id;
			echo json_encode($json);
	    }else{
	    	$json['type'] = 'insert';
	    	$json['success'] = 'no';
			echo json_encode($json);
	    }

		$stmt->close();
	}
$conn->close();	
}

//==============Delete from database by id============
if (isset($_POST['delete'])) {
	$table = $_POST['delete'];
	$id=$_POST['id'];
	if($table == '' || $id == '') exit(0);
	if ($table != '' && $id != '') {
		include "../../init/connection.php";

		$sql = "DELETE FROM ".$table." WHERE id=".$id;

		if ($conn->query($sql) === TRUE) {
		    echo '1';
		} else {
		    echo '-1';//"Error deleting record: " . $conn->error;
		}
		$conn->close();
	}
}


//==============Login , Registation and Password Recovery============
if (isset($_POST['user_sign'])) {
	$action = $_POST['user_sign'];

	//User login
	if ($action == 'login') {
		$email = $_POST['cse_email'];
		$pass = $_POST['cse_pass'];

		if ($email != '' && $pass != '') {

			include "../../init/connection.php";
			$sql = "SELECT * FROM cse_user WHERE email = '".$email."' AND password = '".$pass."'";
			$result = $conn->query($sql);

			if ($result->num_rows == 1){
				session_start();
				$row = $result->fetch_assoc();
				$_SESSION['xbpqwe'] = 'xbbpqf72cabzc4ryun';
				$_SESSION['username'] = $row['name'];
				$_SESSION['first_name'] = $row['user_name'];
				$_SESSION['lase_name'] = $row['email'];
				echo '1';
			}
			else{
				echo '-1';
			}
			$conn->close();
		}
	}elseif ($action == 'registation') {
		
		$user = $_POST['cse_user'];
		$email = $_POST['cse_email'];
		$pass = $_POST['cse_pass'];

		if ($email != '' && $pass != '' && $user != '') {
			include "../../init/connection.php";
			$stmt = $conn->prepare("INSERT INTO cse_user (user_name, email, password) VALUES (?, ?, ?)");
	    	$stmt->bind_param("sss", $user, $email, $pass);
	    	$stmt->execute();

			if ($stmt->affected_rows >0) {
				echo '1';
		    }else{
		    	echo '-1';
		    }
			$conn->close();
		}
	}elseif ($action == 'forget') {
		$email = $_POST['cse_email'];
		if ($email != '') {

			include "../../init/connection.php";
			$sql = "SELECT * FROM cse_user WHERE email = '".$email."'";
			$result = $conn->query($sql);

			if ($result->num_rows == 1){
				echo '1';
				//Take action to send password to user by email
			}
			else{
				echo '-1';
			}
			$conn->close();
		}
	}
}



//==============User avalibility check database by username============
if (isset($_POST['user_available'])) {

	$user = $_POST['user_available'];
	if($user == '') exit(0);

	include "../../init/connection.php";
	$sql = "SELECT * FROM cse_user WHERE user_name = '".$user."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		echo '-1';
	}
	else{
		echo '1';
	}
	$conn->close();
}



?>
