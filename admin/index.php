<?php require"session.php";?>
<?php require"header.php";?>

<!-- Syllabus container -->
<div class="syllabus-container col-md-8 col-md-offset-2 col-sm-12">
  <h1 class="text-center">CSE syllabus</h1>
  <ul class="accordion">
  <?php 
  $term = [1=>'first',2=>'second',3=>'third',4=>'fourth',5=>'fifth',6=>'sixth',7=>'seventh',8=>'eight'];
  foreach($term as $x=>$value) { ?>
    <li>
      <a class="toggle" data="<?php echo $x;?>" href="javascript:void(0);"><?php echo $value." " ;?>Semester</a>
      <ul class="inner">Loading.....</ul>
    </li>
    <?php } ?>
  </ul>
</div>
<!-- Syllabus container end -->

<?php require"footer.php";?>