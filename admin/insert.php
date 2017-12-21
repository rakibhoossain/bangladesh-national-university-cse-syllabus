<?php require"session.php";?>
<?php require"header.php";?>
	<div class="insert_container">
		<div class="banner"><h1 class="text-center">Hey! enter course details</h1></div>
		<div class="insert_subject">
			<textarea name="editor" id="content"></textarea>
			<hr>
	      	<div class="form-inline text-center">
	        	<div class="form-group mx-sm-3">
	            	<label for="code">Course code:</label>
	            	<input type="text" class="form-control" id="code" placeholder="Enter course code">
	        	</div>
	        	<input type="button" class="btn btn-primary" value="Save" id="save">
	        	<input type="button" class="btn btn-warning" value="Clear" id="clear">
	        	<input type="button" class="btn btn-danger" value="Delete" data="" id="delete">
	      	</div>
		</div>
	</div>
	<hr>


	<div class="hbox" id="course_code_container">
      <div id="course_code">
        <?php 
        include "../init/connection.php";
        $sql = "SELECT * FROM course_details ORDER BY code ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        	echo '<a href="javascript:void(0);" class="course-link" data="'.$row['id'].'">'.$row['code'].'</a>';
          } ?> 

      </div>
    </div>



<!-- <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script> -->

<script src="../assets/ckeditor/ckeditor.js"></script>
<script src="../assets/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript">
	$('textarea#content' ).ckeditor();
</script>


<?php require"footer.php";?>