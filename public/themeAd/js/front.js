$(document).ready(function(){

   "use strict";
    
//     start ajax call
    
     $('.container-fluid .login-form').on("submit", function(e)
        {
            e.preventDefault();

            var form = $(this),

                requestUrl = form.attr('action'),

                requestMethod = form.attr('method'),

                result = "#" + form.attr("data-res"),
         
                requestData = form.serialize();

            $.ajax({

                url  : requestUrl, 
                method : requestMethod,
                data : requestData,
                dataType : 'json',
                success : function (res)
                {
                    if(res.success !== undefined)
                        {
                            $(result).parent().addClass('d-flex');
                            
                            $(result).addClass('b-colWrH');
                            
                            $(result).html(res.success);
                            
                            form.children("input[type='submit']").attr('disabled', "true");
                            
                            if (res.cookie !== undefined)
                            {
                                $.cookie(res.cookie, res.cookieVal, { expires: 120 });
                            } 
                            
                            if (res.redirect !== undefined)
                            {
                               setTimeout(function() {
                                   window.location.replace(res.redirect);
                               }, 2000);
                            }
                        }
                        else
                        {
                            $(result).parent().addClass('d-flex');
                            $(result).addClass('b-col4');
                            $(result).html(res.errors);
                        }
                },
                fail : function (error)
                {
                    alert('there is an error, please full this form again');
                }
            });
        });
    
//     end ajax call for login page
    
//     start ajax call for forms requests
    
        $(document).on("submit", "#formy, #update-offer", function(e)
        {
            e.preventDefault();

            var form = $(this),

                requestUrl = form.attr('action'),

                requestMethod = form.attr('method'),
                
                result = "#" + form.attr("data-res"),
         
                requestData = form.serialize();

            $.ajax({
                url  : requestUrl, 
                method : requestMethod,
                data : requestData,
                success : function (res)
                {           
                    $(result).html(res);
                    
                    form.find(".form-control").each(function() {
                        $(this).val("");
                    });
                    
                    $('.modal').modal('hide');
                    
                },
                fail : function (error)
                {
                    alert('there is an error, please full this form again');
                }
            });
        });

        // end ajax call for forms requests
    
    
        // deling with ajax delete btn
       
        $("#ajx-content").on('click', '.delete-ajx', function() {
            
            var btn = $(this),

                requestUrl = btn.attr('data-action'),

                requestMethod = "POST",
                
                result = "#" + btn.attr("data-res"),
         
                requestData = btn.attr("data-id");

            $.ajax({
                url  : requestUrl, 
                method : requestMethod,
                data : {id : requestData},
                success : function (res)
                {           
                    $(result).html(res);
                },
                fail : function (error)
                {
                    alert("it deosn't work");
                }
            });
        });
    
        // end deling with ajax delete btn
    
        // insert input value on update offers
    
        $('#ajx-content').on("click", ".actions .update-offer", function () {
            
            $('#update-offer').modal('show')
            $("#up-id").val($(this).attr('data-id'));
            $("#up1").val($(this).parent().siblings(".price").html());
            $("#up2").val($(this).parent().siblings(".money_type").html());
            $("#up3").val($(this).parent().siblings(".duration_type").html());
            $("#up4").val($(this).parent().siblings(".duration_num").html());

        });
       
        // end insert input value on update offers
    
    
        // insert input value on update seo form
    
        $('#ajx-content, #ajx-contentTrails, #ajx-contentRqs').on("click", ".send-msg, .update-Seo", function () { 
            
            var takeVal = $(this).parent().siblings($(this).data('take')),
                target   = $(this).data('input'),
                data_id   = $(this).data('id'),
                id_target   = $(this).data('inputId');
            
             $(target).val($(takeVal).html());
             $(id_target).val($(data_id).html());
            
            
        });
         
        // ein insert input value on update seo form    
    
    
    // use search function to looking for (category name and description) in #mange-cate in categories page
    
    $('.search-in').on("keyup", function () {

        search($(this));
        
    });
    
    function search($search_field) {
        
        var $search_in = $($search_field.data('search')),
        
             curr = $search_field.val(); // "search input" value
      
        
        $search_in.hide(); // first hide all data 
        
        // if user start to writing in "search field", then start data filtering and hide all useless data
        
        if (curr !== "") {
            
            $search_in.hide(); // first hide all data 
            
            $search_in.find(".search-in").each(function () { //for each elment have "search-in" class in the table  
    
                var  value =  $(this).html(); // get html value  
                
                // check if $search_field.val() exist in this row 
                          
                if (value.toUpperCase().indexOf(curr.toUpperCase()) > -1) {  
                                
                        //if yes then show all info it about it and change the background-color
                                
                    $(this).css("background-color", "rgba(184, 110, 154, 0.61)").parent($search_in).show();

                } else {
                    
                    //reset background color
                    
                    $(this).css("background-color", "");
                }
//                }   
                        
            });
               
        } else { //if there is no value in search field, then show all data in "tabel-body". and reset background color for all
            
            $search_in.show().find(".search-in").each(function () {$(this).css("background-color", ""); });
            
        } 
          
}    
    
})