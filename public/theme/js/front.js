$(document).ready(function(){

   "use strict";
    
    function disableBack() { window.history.back() }

//    alert(window.location.hash);
//      window.onload = disableBack();
//      window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    
    // start nav 
    
    if($(window).scrollTop() > $('nav').height())
    {
        $('nav').css('background-color', '#85DDD1');
    }
    else if($(window).scrollTop() < $('nav').height())
    {
        $('nav').css('background-color', 'transparent');
    }
    
    
    $(window).on("scroll", function() {
        
        if($(window).scrollTop() > $('nav').height())
        {
            $('nav').css('background-color', '#85DDD1');
        }
        else if($(window).scrollTop() < $('nav').height())
        {
            $('nav').css('background-color', 'transparent');
        }
    });
    
    
    //  Start Scrolling
    
    
    $("nav div ul li a, #nav-mobile ul li a, .btn-scroll").click(function () {
        
        $("html, body").animate({

            scrollTop : $("#" + $(this).data("targt")).offset().top

        }, 1000);
        
                var elmWidth = $('#nav-mobile').width();
            $('#nav-mobile').animate({left : - + elmWidth}, 1000); 
    });
    
    
    $('.nav-toggel').on('click', function() {
        
        $('#nav-mobile').animate({left : 0}, 1000); 
        
    });
    
    
    $('body').not($('#nav-mobile')).on('click',function() {
            
        var elmWidth = $('#nav-mobile').width();
        if($('#nav-mobile').css('left') === "0px")
        {
             $('#nav-mobile').animate({left : - + elmWidth}, 300); 
        }
       
        
    
    })
    
    // end nav 
    
    // start costumer
    
    /* count up function */
    
    $(window).on('scroll', function() {
        
        var posLoop = $(".customer div div .loop").position().top - 400;
        
        var elm = $(".customer div div .loop div .num");
        
        function checkDisplay()
        {            
          elm.each(function() {
              
              var $this = $(this);
              
              $({ Counter: 0 }).animate({ Counter: $this.attr('limit') }, {
                duration: 2000,
                easing: 'swing',
                step: function () {
                    
                    $this.text(Math.ceil(this.Counter));
                    
                }
                  
              });
            });
        }
        
        if ($(window).scrollTop() >= posLoop)
        {
            checkDisplay();
            
            $(window).off('scroll');
        }


    });
    
    // end costumer
    
    
    // start ajax call
    
     $('.home-form, #home-form').on("submit", function(e)
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
                                $.cookie(res.cookie, res.cookieVal, { expires: 30 });
                            }
                            if(res.do !== undefined)
                                {   
//                                    
                                    setTimeout(function(){window.location.replace('https://www.best-iptv4k.com/');}, 8000);
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
    
    
    // end ajax call 
    
    // strat custmaize the buy now model
    
    $('.btn-bay').on('click', function() {
        
        var dur = $(this).data('bay');
        
        $('.selector-bay').find("option[value='" + dur + "']").prop('selected', true).siblings().removeAttr('selected');
    })
    // end custmaize the bay now btn
    
    
})
