<?php

// Insert coursee details into database
if (isset($_POST['select'])) {

	$table = $_POST['select'];
	$sem = $_POST['semester'];

	$not_found = "";

	if ($table != '' && $sem !='') {

		include "init/connection.php";

		$names = array();
		$trm = ['','1st','2nd','3rd','4th','5th','6th','7th','8th'];

		$sql = "SELECT * FROM ". $table ." WHERE semester = ".$sem." ORDER BY code ASC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) { 
			$i=0; 
			while($title = $result->fetch_field()) {
				$th=$title->name;
				if ($th=='id') continue;
				if ($th=='semester') continue;
				$names[$i]=$th;
				$i++; 
			}
		?>
				<div class="resource-container <?php echo $table;?>">
				<table class="subject">
					<thead>
						<tr>
						<?php 
							$length = count($names);
  							for ($i=0; $i < $length ; $i++) echo "<th class='$names[$i]'>".$names[$i]."</th>"; 
						 ?>
						</tr>
					</thead>
					<tbody>

					<?php 
						$length = count($names);
						while($row = $result->fetch_assoc()) {
							echo '<tr>';
  							$length = count($names);
  							for ($i=0; $i < $length ; $i++) {
  								if ($names[$i] == 'link') {
									echo '<td><a href="'.$row[$names[$i]].'">Download</a></td>';
								}else{
									echo '<td>'.$row[$names[$i]].'</td>';
								}
  							}        
							echo '</tr>';
						}
						echo '</tbody>';

						if ($table == 'course') {
							echo '<tfoot><tr class="tbl_row_blnk"><td colspan="'.$length.'" class="dwn text-center pointer" data="'.$trm[$sem].'">Download</td></tr></tfoot>';
						}else{
							echo '<tfoot><tr class="tbl_row_blnk"><td colspan="'.$length.'" class="text-center">'.$trm[$sem].' Semester</td></tr></tfoot>';
						}

					?>
				</table>
			</div>
			<?php
    	}else{
    		$not_found = '<div id="notification"><h1>No Result Found</h1></div>';
  		}
    	$conn->close();
?>
<script type="text/javascript">
	$("td.dwn").css("cursor", "pointer");
	$("td.dwn").click(function(){
		var data = $(this).attr('data');
		var href = "http://www.sbpgc.edu.bd/download/sylebus/"+data+"_semester.pdf";
		window.location.href = href;
	});
</script>
<?php
	}else{
		$not_found = '<div id="notification"><h1>No Result Found</h1></div>';
	}
	echo $not_found;
}
?>