    <script src="<?php echo assests('theme/js/jquery.js'); ?>"  crossorigin="anonymous"></script>
    <script src="<?php echo assests('theme/js/popper.js'); ?>"  crossorigin="anonymous"></script>
    <script src="<?php echo assests('theme/js/bootstrap.min.js'); ?>" crossorigin="anonymous"></script>
    <script src="<?php echo assests('theme/js/jquery.cookie.js'); ?>" crossorigin="anonymous"></script>
    <script src="<?php echo assests('theme/js/front.js'); ?>" crossorigin="anonymous"></script>
    <script>
        $(window).on("load", function () 
        {

            $.ajax({
            url      : "<?php echo url('/vs'); ?>",
            method   : "POST",
            data     : { pageWidth: window.innerWidth},
            dataType : 'json',
            success : function (res)
            {
                setTimeout(function() {setInterval(function() {ajaxOnline(res.id);}, 5000)}, 5000);
            }  
            });

        });
      
        
        function ajaxOnline(id) 
        {
        $.ajax({
            url      : "<?php echo url('/online'); ?>",
            method   : "POST",
            data     : { id : id},
          });
        }
        
//    setTimeout(function() {setInterval(function() {ajaxOnline();}, 5000)}, 9000); 

    </script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- net -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-0143909577903373"
     data-ad-slot="2460147314"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</html>

