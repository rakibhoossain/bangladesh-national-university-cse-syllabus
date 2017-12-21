<?php
session_start();
if (isset($_SESSION['xbpqwe'])) {
  $key=$_SESSION['xbpqwe'];
  if ($key=='xbbpqf72cabzc4ryun') {
    header('Location: index.php');
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login - CSE syllabus</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link href="assets/style.css" rel='stylesheet' type='text/css' />

<script src="../assets/js/jquery.min.js"></script>
</head>
<body>

<section id="content">
  <div class="container relative">
  <div class="row">

      <div class="col-sm-12 col-md-10 col-md-offset-1">

      <div class="vcen login" id="logn_cnt">
      <div id="logo-container"><i class="fa fa-2x fa-sign-in"></i></div>

          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
            <input type="email" class="form-control email" placeholder="Email address" id="login_email">          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control password" placeholder="Password" id="login_pass">     
          </div>
          <div class="form-group">
            <button type="button" id="login" class="btn btn-def btn-block" disabled="disabled">Login</button>
          </div>
          <div class="form-group text-center">
            <a href="javascript:void(0);" class="reg_cnt_btn">Need an account</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="fog_cnt_btn">Forget Password</a>
          </div>
          <div class="form-group text-center msg" id="logn_msg"></div>

        </div> 



      <div class="vcen registation" id="reg_cnt">
      <div id="logo-container"><i class="fa fa-2x fa-sign-in"></i></div>

          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
            <input type="email" class="form-control email" placeholder="Email address" id="reg_email">          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control username" placeholder="username" id="reg_username">          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control password" placeholder="Password" id="reg_pass">     
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" id="condition"> I agree to the <a href="#">Terms and Conditions</a>
            </label>
          </div>
          <div class="form-group">
            <button type="button" id="registation" class="btn btn-def btn-block" disabled="disabled">Registation</button>
          </div>
            <div class="form-group text-center">
            <a href="javascript:void(0);" class="logn_cnt_btn">Already have an account</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="fog_cnt_btn">Forget Password</a>
          </div>
          <div class="form-group text-center msg" id="reg_msg"></div>
        </div>

      <div class="vcen forgate-pass" id="fog_cnt">
      <div id="logo-container"><i class="fa fa-2x fa-sign-in"></i></div>

          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
            <input type="email" class="form-control email" placeholder="Email address" id="forget_email">          
          </div>
          <div class="form-group">
            <button type="button" id="forget-pass" class="btn btn-def btn-block" disabled="disabled">Send</button>
          </div>
          <div class="form-group text-center">
             <a href="javascript:void(0);" class="logn_cnt_btn">Already have an account</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="fog_cnt_btn">Forgot Password</a>
          </div>
          <div class="form-group text-center msg" id="fog_msg"></div>
        </div>


      </div>  
        
  </div>
</div>
</section>

</body>
<script src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

		    $("#login").click(function(){
		      var email = $("#login_email").val();
		      var pass = $("#login_pass").val();
		        $.ajax({
		         type: 'post',
		         url: 'adaptar/db.php',
		         data: {
		          user_sign : 'login',
		          cse_email : email,
		          cse_pass : pass
		         },
		         success: function (response) {
              var href = "index.php";
              window.location.href = href;
		        	}
		        });
		    });
		    $("#registation").click(function(){
          var _this = this;
		      var email = $("#reg_email").val();
		      var pass = $("#reg_pass").val();
		      var user = $("#reg_username").val();
		      if($('#condition').is(":checked")){
                    
		        $.ajax({
		         type: 'post',
		         url: 'adaptar/db.php',
		         data: {
		          user_sign : 'registation',
		          cse_email : email,
		          cse_user : user,
		          cse_pass : pass
		         },
		         success: function (response) {
              if (parseInt(response) == 1) {
                  $("#reg_email").val('');
                  $("#reg_pass").val('');
                  $("#reg_username").val('');
                  $('#condition').attr('checked', false);
                  $(_this).parents(".vcen").find('.msg').html('Success').fadeOut(3000);
                }
		        	}
		        });

          }else{
            $('#reg_msg').html("<span class=\'danger\'>Chech tearm and Condition</span>").fadeOut(3000);
          }
		    });
        

		    $("#forget-pass").click(function(){
		      var email = $("#forget_email").val();

		        $.ajax({
		         type: 'post',
		         url: 'adaptar/db.php',
		         data: {
		          user_sign : 'forget',
		          cse_email : email
		         },
		         success: function (response) {
					console.log(response);
		        	}
		        });
		    });

        $("#reg_username").blur(function(){
          var _this = this;
          var user_check = $("#reg_username").val();
          if(user_check == '') return;
            $.ajax({
             type: 'post',
             url: 'adaptar/db.php',
             data: {
              user_available : user_check
             },
             success: function (response) {
              if (parseInt(response) == 1) {
                $(_this).css('color','green');
              }else{
                $(_this).css('color','red');
                $("#reg_msg").html("<span class='danger'>Username not avaliavle</span>").fadeOut(3000);
              }
              }
            });
        });

        $(".username").blur(function(){
          val = $(this).val();
          usernameCheck(val,this);
        });
        $(".email").blur(function(){
          val = $(this).val();
          emailCheck(val,this);
        });
        $(".password").blur(function(){
          val = $(this).val();
          passCheck(val,this);
        });

        function emptyCheck(val,sh){
          if (val == '') {
            $(sh).parents(".vcen").find('.btn').attr('disabled',true);
            $(sh).parents(".vcen").find('.msg').html('Fill up all information').fadeOut(3000);
          }else{
            $(sh).parents(".vcen").find('.btn').attr('disabled',false);
          }
        }
        function emailCheck(val,sh){
          if (val != '') {
            var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,3})+$/;
            var result = email_regex.test(val);
            if (result) {
              $(sh).css('color','green');
              $(sh).parents(".vcen").find('.btn').attr('disabled',false);
            }else{
              $(sh).css('color','red');
              $(sh).parents(".vcen").find('.btn').attr('disabled',true);
              $(sh).parents(".vcen").find('.msg').html('Invalid Email').fadeOut(3000);
            }
          }else{
            emptyCheck(val,sh);
          }
        }
        function passCheck(val,sh){
          if (val != '') {
            var pass_regex = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/);
            var result = pass_regex.test(val);
            if (result) {
              $(sh).css('color','green');
              $(sh).parents(".vcen").find('.btn').attr('disabled',false);
            }else{
              $(sh).css('color','red');
              $(sh).parents(".vcen").find('.btn').attr('disabled',true);
              $(sh).parents(".vcen").find('.msg').html('Password Invalid').fadeOut(3000);
            }
          }else{
            emptyCheck(val,sh);
          }
        }
        function usernameCheck(val,sh){
          if (val != '') {
            var username_regex = (/^[a-z0-9_-]{3,15}$/);
            var result = username_regex.test(val);
            if (result) {
              $(sh).css('color','green');
              $(sh).parents(".vcen").find('.btn').attr('disabled',false);
            }else{
              $(sh).css('color','red');
              $(sh).parents(".vcen").find('.btn').attr('disabled',true);
              $(sh).parents(".vcen").find('.msg').html('Username must be between 6-8 character').fadeOut(3000);
            }
          }else{
            emptyCheck(val,sh);
          }
        }


        $(".logn_cnt_btn").click(function(){
          $(this).parents(".vcen").fadeOut('slow', function(c){
            $('#logn_cnt').show();
          });
        });

        $(".reg_cnt_btn").click(function(){
          $(this).parents(".vcen").fadeOut('slow', function(c){
            $('#reg_cnt').show();
          });
        });

        $(".fog_cnt_btn").click(function(){
          $(this).parents(".vcen").fadeOut('slow', function(c){
            $('#fog_cnt').show();
          });
        });







        // $(".reg_cnt_btn").click(function(){
        //   $(this).parents(".vcen").hide();
        //   $('#reg_cnt').show();
        // });

        // $(".fog_cnt_btn").click(function(){
        //   $(this).parents(".vcen").hide();
        //   $('#fog_cnt').show();
        // });





		});
		
	</script>
</html>