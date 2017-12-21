/*
 * Name: CSE syllabus admin view js
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

  //jQuery Ready Function end   
    });

    jQuery(window).load(function() {
        //$(".home-preloder").fadeOut(3000);
        //jquery Load Function end
    });

    //Jquery end
}(jQuery));