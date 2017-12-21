<?php

// Getting Resource , Books and Course list request
if (isset($_POST['select']) || isset($_POST['semester'])) {

	$table = $_POST['select'];
	$sem = $_POST['semester'];
	
	$names = array();
	$selector = array();

	if ($sem == 0 || $table == '') exit(0);

		include "../init/connection.php";	

		$sql = "SELECT * FROM ". $table ." WHERE semester = ".$sem." ORDER BY code ASC";
		$result = $conn->query($sql);

		$i=0; 
		while($title = $result->fetch_field()) {
			$th=$title->name;
			if ($th=='id') continue;
			$names[$i]=$th;
			$i++; 
		}

		if ($result->num_rows > 0) { ?>
			<div class="resource-container <?php echo $table; ?>">
				<table class="<?php echo $table; ?>">
					<thead>
						<tr>
						<?php 
							$length = count($names);
  							for ($i=0; $i < $length ; $i++) echo "<th class='$names[$i]'>".$names[$i]."</th>"; 
						 ?>
						<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$length = count($names);
						while($row = $result->fetch_assoc()) {
						$id= $row['id'];
						echo '<tr class="action" data="'.$id.'">';
  							$length = count($names);
  							for ($i=0; $i < $length ; $i++) { ?>
								<td contenteditable="true" onBlur="saveToDatabase(this,'<?php echo $names[$i]; ?>','<?php echo $id; ?>','<?php echo $table; ?>')" onClick="showEdit(this);">
								<?php echo $row[$names[$i]].'</td>';
  							}        
							echo '<td class="delete-row text-center pointer">Delete</td></tr>';
						} 	

					echo '</tbody>';
					echo '<tfoot>';

						echo '<tr id="blank" class="tbl_row_blnk" data="'.$sem.'">';
						for ($i=0; $i < $length ; $i++) echo '<td contenteditable="true" id="'.$names[$i].'"></td>';
						echo '<td class="text-center add-row pointer">Add</td></tr>';
					?>

					</tfoot>
				</table>
			</div>

		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#3f4369");
		} 
		
		function saveToDatabase(editableObj,name,target,tbl) {
			$(editableObj).css("background","#0e0b19 url(../assets/img/loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "adaptar/db.php",
				type: "POST",
				data: {
					table: tbl,
			        column: name,
			        editval: editableObj.innerHTML,
			        id:target
			    },
				success: function(data){
					$(editableObj).css("background","#868aaf");
				}        
		   });
		}
		
		// delete row
        $(".delete-row").click(function(){
        	var target = $(this).parents("tr").attr('data');
        	var _this = this;
        	if (!confirm('Are you sure to delete!')) 
          		return;

			$.ajax({
				url: "adaptar/db.php",
				type: "POST",
				data: {
					delete: <?php echo "'".$table."'"; ?>,
			        id: target
			    },
				success: function(resp){
					if (parseInt(resp)>0) $(_this).parents("tr").remove();
				}        
		   });

        });
		
		// add row
        $(".add-row").click(function(){

            <?php
            	$markup = 'var markup = "<tr>';
            	$length = count($names);
  				for ($i=0; $i < $length ; $i++) {
  					echo 'var '.$names[$i].' = $("#'.$names[$i].'").text();';
  					$markup.='<td>"+'.$names[$i].'+"</td>';
  				}
  				$markup .= '</tr>"';
  				echo $markup;
  			?>

			$.ajax({
				url: "adaptar/db.php",
				type: "POST",
				data: {
					insert: <?php echo "'".$table."'"; ?>,
			<?php
            	$length = count($names);
  				for ($i=0; $i < $length ; $i++) {
  					
  					if ($i+1 == $length) {
  						echo $names[$i].' : '.$names[$i];
  					}else{
						echo $names[$i].' : '.$names[$i].',';
  					}
  				}
  			?>
			    },
				success: function(resp){
					if (parseInt(resp)>0) {

			<?php
            	$length = count($names);
  				for ($i=0; $i < $length ; $i++) {
  					
  					echo '$("#'.$names[$i].'").text(\'\');';
  				}
  			?>						
						$("table tbody").append(markup);
					}
				}        
		   });

        });

		</script>

			<?php
    			}else{
				// if Result NOT Found
				?>
				<div class="resource-container <?php echo $table; ?>">
				<table class="<?php echo $table; ?>">
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
						echo '<tr id="blank" class="tbl_row_blnk" data="'.$sem.'">';
						for ($i=0; $i < $length ; $i++) echo '<td contenteditable="true" id="'.$names[$i].'"></td>';
						echo '</tr>';
					?>
						<tr>
							<td colspan="4" class="add-row text-center pointer">Add Now</td>
						</tr>
					</tbody>
				</table>
			</div>

		<script type="text/javascript">
	        $(".add-row").click(function(){

            <?php
            	$markup = 'var markup = "<tr>';
            	$length = count($names);
  				for ($i=0; $i < $length ; $i++) {
  					echo 'var '.$names[$i].' = $("#'.$names[$i].'").text();';
  					$markup.='<td>"+'.$names[$i].'+"</td>';
  				}
  				$markup .= '</tr>"';
  				echo $markup;
  			?>

			$.ajax({
				url: "adaptar/db.php",
				type: "POST",
				data: {
					insert: <?php echo "'".$table."'"; ?>,
			<?php
            	$length = count($names);
  				for ($i=0; $i < $length ; $i++) {
  					
  					if ($i+1 == $length) {
  						echo $names[$i].' : '.$names[$i];
  					}else{
						echo $names[$i].' : '.$names[$i].',';
  					}
  				}
  			?>
			    },
				success: function(resp){
					if (parseInt(resp)>0) {

			<?php
            	$length = count($names);
  				for ($i=0; $i < $length ; $i++) {
  					
  					echo '$("#'.$names[$i].'").text(\'\');';
  				}
  			?>						
						$("table tbody").append(markup);
					}
				}        
		   });

        });

		</script>



<?php
  	}
    $conn->close();
}

?>