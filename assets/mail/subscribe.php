<?php
$owner_email="serakib@gmail.com";
$sitename="www.schoolz.com";
//$name="Visitor";
//$email="example@gmail.com";

$name='e';
$email='r';
$error='';

	if (isset($_POST['name'])) {$name=$_POST['name'];} 
	if (isset($_POST['email'])) {$email=$_POST['email'];}
	
//Mail Variable Subscribe
$sbj_visitor='Newsletter subscription confirmation email from ';
$sbj_owner='Newsletter subscription request from ';
$header="Content-type: text/html; charset=utf-8 \r\n";	
	
//Subscribe Mail	
$msg_visitor='<a href="http://'.$sitename.'">'.$sitename.'</a>'."\n".'<br>'.'Hi, '.$name."\n".'<br>'.'Thank you for subscribing to our newsletter!';		
$msg_owner='<a href="http://'.$sitename.'">'.$sitename.'</a>'."\n".'<br>'.'This email has been sent via newsletter subscription form '.$sitename.'<br>'. 'A new visitor would like to be added to your website\'s newsletter:'."\n".'<br>'.'Visitor name: '.$name."\n".'<br>'.'Visitor email: '.$email."\n".'<br>'.'Please add him (her) to your newsletter list.';

	//error handler function
	function violetError($errno, $errstr) {
	  $error = "<b>Error:</b> [".$errno."] ".$errstr;
	}
	set_error_handler("violetError");	

	try{
		if(($name=='') || ($email=='')) {
		throw new Exception('Information empty');
		}
		if(!mail($email,$sbj_visitor,$msg_visitor,$header.'From: '.$owner_email)){
			throw new Exception('user mail failed');
		}
		if(!mail($owner_email,$sbj_owner,$msg_owner,$header.'From: '.$email)){
			throw new Exception('owner mail failed');
		}
	}catch(Exception $e){
		$error= $e->getMessage();
	}
$error='';
$outp= '{"error":"'.$error.'"}';
echo($outp);	
?>