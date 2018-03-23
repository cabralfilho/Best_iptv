  $(function () {
      'use strict';
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
      
    var flag = false;
        
    $('#login-form').on("submit", function(e)
    {
        e.preventDefault();
        
        if (flag === true)
            {
                return false;
            }

        var form = $(this),
        
            requestUrl = form.attr('action'),
        
            requestMethod = form.attr('method'),
    
            requestData = form.serialize(),
            
            resLog = $('#login-result');

        $.ajax({
            
            url  : requestUrl, 
            method : requestMethod,
            data : requestData,
            dataType : 'json',
            beforeSend : function () {
                flag = true;
                $('#but-form').attr('disabled', true);
                resLog.removeClass().addClass("alert alert-info").html("login .........");
            },
            success : function (res)
            {

                if(res.success !== undefined && res.redirect !== undefined)
                    {
                        resLog.removeClass('alert-info').addClass('alert-success').html(res.success);
                        
                        setTimeout(function(){window.location.href = res.redirect;},2000);
                    }
                else
                    {
                        resLog.removeClass('alert-info').addClass('alert-danger').html(res.errors);
                        $('#but-form').removeAttr('disabled');
                        flag = false;
                    }

                
            },
            fail : function (error)
            {
                alert('there is an error');
            }
            
            
        });
        
  
        
    });
      
      
  });