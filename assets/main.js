/*
 * Name: CSE Syllabus Main js
 * Version : 1.0.0
 * URL: http://www.rakibhossain.cf/
 * Description: This js file is required for different interactive task
 * Author   : Rakib Hossain
/* Email    :   serakib@gmail.com                   
/* Facebook :   http://www.facebook.com/prof.rakib  
/* Github   :   http://github.com/serakib           
/* Linkedin :   https://www.linkedin.com/in/serakib 
/* Website  :   http://www.rakibhossain.cf 
 *========================================
 */

(function($) {
    "use strict";
    jQuery(document).ready(function($) {

 //==================Measure height======================
        var windowSize = $(window).width();
        var windowHeight = getViewPortHeight();

        $(window).resize(function() {
            windowSize = $(window).width();
            windowHeight = getViewPortHeight();

            $('#main-container').css({'min-height': windowHeight - getAllocatedHight() + 'px'});
        });

        function getViewPortHeight() {
            //detech ios chrome
            if (navigator.userAgent.match('CriOS')) {
                return window.innerHeight;
            }
            return $(window).height();
        }
        
        $('#main-container').css({'min-height': windowHeight - getAllocatedHight() -20 + 'px'});


        function getAllocatedHight() {
            var menuheight = $('#cssmenu').height();
            var footerheight = $('footer').height();
            return menuheight + footerheight;
        }



    // Navigation
     $('#cssmenu').prepend('<div id="menu-button" class="text-center">Menu</div>');
      $('#cssmenu #menu-button').on('click', function(){
        var menu = $(this).next('ul');
        if (menu.hasClass('open')) {
          menu.removeClass('open');
        }
        else {
          menu.addClass('open');
        }
      });

    $('.toggle').click(function(e) {
      e.preventDefault();
        var $this = $(this);
        if ($this.next().hasClass('show')) {
            $this.next().removeClass('show');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('li .inner').removeClass('show');
            $this.parent().parent().find('li .inner').slideUp(350);
            $this.next().toggleClass('show');
            $this.next().slideToggle(350);
        }
    });

//===============notification==========
$('div#notification').click(function(){
  $(this).addClass('none');
});


//===============contact map scrolling disable==========
  $('.contact-map').click(function(){
      $(this).find('iframe').addClass('clicked')}).mouseleave(function(){
      $(this).find('iframe').removeClass('clicked')});

// ==============Show Table Data==============
    function show_table_data(val,sh,tbl)
     {
      $.ajax({
       type: 'post',
       url: 'course.php',
       data: {
        select : tbl,
        semester: val
       },
       success: function (response) {
        $(sh).html(response); 
       }
      });
     }
      $('#cssmenu .book').on('click', function(e){
        e.preventDefault();
        var val = $(this).attr("data");
        var sh = $('section#main');
        show_table_data(parseInt(val),sh,'ebook');
      });
      $('#cssmenu .res').on('click', function(e){
        e.preventDefault();
        var val = $(this).attr("data");
        var sh = $('section#main');
        show_table_data(parseInt(val),sh,'resource');
      });
      $(".accordion>li>a").click(function(){
        var val = $(this).attr("data");
        var sh = $(this).parent().find("ul.inner");
        show_table_data(parseInt(val),sh,'course');
      });

//===============contact form==========
//select checkbox data
$(".contact-form #subscribe").click(function(){
  _this=this;
  if($(_this).val()==''){
    $(_this).val('yes');
  }else{$(_this).val('');}
  
});
//form action
$(".contact-form .submit").click(function(e){
  userSubmitForm();
  e.preventDefault();
  return false;
});
    //select util.js required
          function userSubmitForm(){
            var error = formValidate($(".contact-form form"), {
              error_message_show: true,
              error_message_time: 55000,
              error_message_class: "info-error",
              error_fields_class: "error_fields_class",
              exit_after_first_error: true,
              rules: [
                {
                  field: "username",
                  min_length: { value: 1,  message: 'Name can\'t not be empty' },
                  max_length: { value: 16, message: 'Name too long'}
                },
                {
                  field: "email",
                  min_length: { value: 7,  message: 'Email can not be empty' },
                  max_length: { value: 30, message: 'Email too long'},
                  mask: { value: "^([a-z0-9_\-]+\\.)*[a-z0-9_\\-]+@[a-z0-9_\-]+(\\.[a-z0-9_\-]+)*\\.[a-z]{2,6}$", message: 'Email Incorrect'}
                },
                {
                  field: "message",
                  min_length: { value: 1,  message: 'Message can not be empty' },
                  max_length: { value: 250, message: 'Too \'long message'}
                }
              ]
            });
            if (!error) {

              var user_name  = $(".contact-form #username").val();
              var user_email = $(".contact-form #email").val();
              var user_msg   = $(".contact-form #message").val();
        var user_subscription   = $(".contact-form #subscribe").val();
      
       //
      if(user_subscription!=''){
        var sdata = {
                action: "submit_subscription",
                nonce: "m32ow3stg6",
                name: user_name,
                email: user_email
              };
        $.post("assets/mail/subscribe.php", sdata, userSubscriptionResponse, "text");
        
      }
      //send data
              var data = {
                action: "submit_contact_form",
                nonce: "m32o0mqf67",
                name: user_name,
                email: user_email,
                msg: user_msg
              };
              $.post("assets/mail/send.php", data, userSubmitFormResponse, "text");
            }

          }

    //get response
          function userSubmitFormResponse(response) {
            var rez = JSON.parse(response);
            $(".contact-form .result")
              .toggleClass("info-error", false)
              .toggleClass("info-success", false);
            if (rez.error == "") {
              $(".contact-form #subscribe").val('');
              $(".contact-form .result").addClass("info-success").html("Your message sent!");
              setTimeout("$('.contact-form .result').fadeOut(); $('.contact-form form').get(0).reset();", 3000);
            } else {
              $(".contact-form .result").addClass("info-error").html("Transmit failed! " + rez.error);
            }
            $(".contact-form .result").fadeIn();
          }
      
    //get subscription response
          function userSubscriptionResponse(response) {
            var rez = JSON.parse(response);
            $(".subscribe")
              .toggleClass("error", false)
              .toggleClass("success", false);
        $('.subscribe').fadeIn();
            if (rez.error == "") {
              $(".subscribe").addClass("success");
              $(".subscribe .notice").html("Your Subscription Success!");
              
            } else {
              $(".subscribe").addClass("error");
              $(".subscribe .notice").html("Subscription failed");
            }
            setTimeout("$('.subscribe').fadeOut();", 3000);
          }
//===============contact form end==========
        //jQuery Ready Function end   
    });

    jQuery(window).load(function() {
        //$(".home-preloder").fadeOut(3000);
        //jquery Load Function end
    });

    //Jquery end
}(jQuery));