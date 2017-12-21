<?php 
$sitename='www.domain.com';
$name=$email=$msg='';
$error='';
//Mail variables
$headers=$subject=$messageBody="";
$owner_email='serakib@gmail.com';

//---------------------------------------------------------
	//Get data
	if (isset($_POST['name'])) {$name=$_POST['name'];} 
	if (isset($_POST['email'])) {$email=$_POST['email'];} 
	if (isset($_POST['msg'])) {$msg=$_POST['msg'];}
//=======Mail Variables=======

  try{
    if(($name=='') || ($email=='') || ($msg=='')) {
      throw new Exception('Information empty');
    }

	
	//message header
	$headers = 'From:' . $email;
	$subject = 'A message from your site visitor ' . $name;
	
	//message body
	$messageBody = "";
	$messageBody .= '<p>Visitor: ' . $name . '</p>' . "\n";
	$messageBody .= '<p>Email Address: ' . $email . '</p>' . "\n";
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Message: ' . $msg . '</p>' . "\n";
	
	
	//error handler function
	function violetError($errno, $errstr) {
	  $error = "<b>Error:</b> [".$errno."] ".$errstr;
	}
	set_error_handler("violetError");
	
	//send mail
	if(!mail($owner_email, $subject, $messageBody, $headers)){
		throw new Exception('Mail not Send');
	}
	
  }catch(Exception $e) {
    $error = $e->getMessage();
  }

$outp= '{"error":"'.$error.'"}';
echo($outp);
?>