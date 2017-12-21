<?php require"../session.php";?>

<?php
//This file help you to insert data into database from text files (data.txt)

$lines = file('data.txt');

$i=$r=$code=0;
$name='';
$credit=0.0;
$semester = 1;

$afct_row = 0;

$code_semester=110;

if (sizeof($lines)>3) {
	include "../../init/connection.php";
	$stmt = $conn->prepare("INSERT INTO course (code,name,credit,semester) VALUES (?, ?, ?, ?)");
}

foreach($lines as $line)
{
	$i++;
	if ($i%2==0) continue;
	$r++;

	if ($r==1) {

		$code_semester++;
		$code = str_replace("CSE-","",$line);

		if ($code_semester!==(int)$code) {
			$code_semester = (int)$code;
			if ($semester<8) {
				$semester++;
			}
		}

	}elseif ($r==2) {
		$name = $line;
	}elseif ($r==3) {
		$credit = $line;
		$r=0;

    $stmt->bind_param("ssdi", $code, $name,$credit, $semester);
    $stmt->execute();
	$afct_row += $stmt->affected_rows;

	}

}
echo $afct_row ." Row Inserted";

$stmt->close();
$conn->close();
?>