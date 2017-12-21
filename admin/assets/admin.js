/*
 * Template name: Admin js
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

// =========Editor data insert update by ajax
      function editor()
       {
        var val = $('textarea#content').val();
        var cod = $('input#code').val();
        $.ajax({
         type: 'post',
         url: 'adaptar/db.php',
         data: {
          editor:val,
          code:cod
         },
         success: function (response) {
          try
            {
              var json = $.parseJSON(response);
              if (json['success'] == 'yes' && json['type'] == 'insert') {
                var markup = "<a href='javascript:void(0);' class='course-link' data='"+json['id']+"'>"+cod+"</a>";
                $("#course_code").append(markup);
              }
            }catch(e)
            {console.log(e);}
        }
        });
      }

    $("#save").click(function(){
      editor();
    });

//==========Clear field======
    $("#clear").click(function(){
      $('textarea#content').val('');
      $('input#code').val('');
      $("#delete").attr("data",'');
    });

// =========Editor data delete by ajax
      function editor_delete(id)
       {
        if (!confirm('Are you sure to delete!')) {
          return;
        }
        $.ajax({
         type: 'post',
         url: 'adaptar/db.php',
         data: {
          delete : 'course_details',
          id :id
         },
         success: function (response) {
          if (parseInt(response)>0) {
            $('textarea#content').val('');
            $('input#code').val('');
            $("a.course-link[data="+id+"]").remove();
          }
        }
        });
      }

    $("#delete").click(function(){
      var id = $(this).attr("data");
      editor_delete(id);
    });

// =========Show course details by clicking list
    function editor_code_show(id, val)
       {
        //var code_int = parseInt(code);
        $.ajax({
         type: 'post',
         url: 'adaptar/db.php',
         data: {
          course_details : id
         },
         success: function (response) {
          $('textarea#content').val(response);
          $('input#code').val(val);
          $('input#delete').attr('data',id);
          }
        });
     }

    $('a.course-link').on('click', function(e){
        e.preventDefault();
        var id = $(this).attr("data");
        var val = $(this).text();
        editor_code_show(id, val);
      });

//==================Select table data=====================
    function select_data(val,sh,tbl)
     {
      $.ajax({
       type: 'post',
       url: 'ajax.php',
       data: {
        select: tbl,
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
        select_data(val,sh,'ebook');
      });
      $('#cssmenu .res').on('click', function(e){
        e.preventDefault();
        var val = $(this).attr("data");
        var sh = $('section#main');
        select_data(val,sh,'resource');
      });
    $(".accordion>li>a").click(function(){
      var _this = $(this).attr("data");
      var sh = $(this).parent().find("ul.inner");
      select_data(parseInt(_this),sh,'course');
    });



    
    //jQuery Ready Function end   
    });

    //Jquery end
}(jQuery));