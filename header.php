<?php
//Semesters in CSE
$semes = array( 
    "First" => array ('First','Second'),
    "Second" => array ('First','Second'),
    "Third" => array ('First','Second'),
    "Fourth" => array ('First','Second')
);


?>
<!DOCTYPE html>
<html>
<head>
	<title>National University CSE syllabus</title>

    <!-- SEARCH ENGINES -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Rakib Hossain">
    <meta name="keywords" content="National University,CSE,cse, syllabus,Gazipur,Bangladesh,NU, জাতীয় বিশ্ববিদ্যালয়,বাংলাদেশ  " />
    <meta name="description" content="National University CSE syllabus">
    <link rel="canonical" href="http://nucse.is-best.net">

    <!-- FACESPACE -->
    <meta property="og:site_name" content="Rakib Hossain">
    <meta property="og:url" content="http://nucse.is-best.net">
    <meta property="og:type" content="website">
    <meta property="og:title" content="National University CSE syllabus">
    <meta property="og:description" content="Development By Rakib Hossain">
    <meta property="og:image" content="http://nucse.is-best.net/assets/img/share.jpg">
    <meta property="fb:app_id" content="1389892087910588">
	
	<link href="assets/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/menu.css">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" type="text/css" href="assets/responsive.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div id='cssmenu'>
	<ul>
	   <li><a href='index.php'><span>Home</span></a></li>
	   <li class='has-sub'><a href='#'><span>Ebook</span></a>
			<ul>
				<?php
					$i=1;
					foreach($semes as $k=>$val){
	         			echo '<li class="has-sub"><a href="#"><span>'.$k.' Year</span></a><ul>';
	               		foreach($val as $j){echo '<li><a href="#" class="book" data="'.$i.'"><span>'.$j.' Semester</span></a></li>'; $i++;}
	            	echo '</ul></li>';	
					} 
				?>
	        </ul>
	   </li>
	   	<li class='has-sub'><a href='#'><span>Resource</span></a>
			<ul>
				<?php
					$i=1;
					foreach($semes as $k=>$val){
	         			echo '<li class="has-sub"><a href="#"><span>'.$k.' Year</span></a><ul>';
	               		foreach($val as $j){echo '<li><a href="#" class="res" data="'.$i.'"><span>'.$j.' Semester</span></a></li>'; $i++;}
	            	echo '</ul></li>';	
					} 
				?>
	        </ul>
	   </li>
	   <li><a href='about.php'><span>About</span></a></li>
	   <li class='last'><a href='contact.php'><span>Contact</span></a></li>
	</ul>

	</div>
	<div class="container" id="main-container">
		<div class="row">
			<section id="main">	

	
