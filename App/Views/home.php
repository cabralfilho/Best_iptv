<?php echo $header;?>

    <!--    start nav-->
    <nav class="navbar navbar-expand fixed-top nav nav-pills nav-fill d-none d-lg-block d-xl-block" id="">
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item ">
        <div class="m-1">
            <img src="<?php echo assests('theme/imgs/4k-icon.png'); ?>" class="">
        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-targt = "header"><?php echo $free_trial; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-targt = "offering"><?php echo $channels_Packages; ?></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-targt = "devices"><?php echo $resellers; ?></a>
                </li>
                <li class="nav-item d-none">
                    <a class="nav-link" data-targt = ""><?php echo $restream; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-targt = "iptvChanels" ><?php echo $store; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-targt = "contact"><?php echo $contact; ?></a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $cccamCode; ?>">Daily Cccam</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- start nav mobile -->
    <div class="nav-toggel d-lg-none d-xl-none position-fixed b-col1 w-100 d-flex justify-content-around">
        <div class="m-1">
            <img src="<?php echo assests('theme/imgs/4k-icon.png'); ?>" class="">
        </div>
        <i class="fas fa-align-justify  fa-2x col4 m-1 p-2 b-col0 rounded"></i>
    </div>
    <section class="d-block d-lg-none d-xl-none col4 position-fixed b-col1" id="nav-mobile">
            <ul class="nav nav-pills nav-fill  d-flex flex-column">
                <li class=" mt-3">
                    <a class="nav-link" data-targt = "header" ><?php echo $free_trial; ?></a>
                </li>
                <li class="mt-3">
                    <a class="nav-link" data-targt = "offering" ><?php echo $channels_Packages; ?></a>
                </li>
                <li class="mt-3">
                    <a class="nav-link" data-targt = "devices" ><?php echo $resellers; ?></a>
                </li>
                <li class="d-none mt-3">
                    <a class="nav-link" data-targt = "" ><?php echo $restream; ?></a>
                </li>
                <li class="mt-3">
                    <a class="nav-link" data-targt = "iptvChanels" ><?php echo $store; ?></a>
                </li>
                <li class="mt-3">
                    <a class="nav-link" data-targt = "contact" ><?php echo $contact; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col4" href="<?php echo $cccamCode; ?>">Daily Cccam</a>
                </li>
            </ul>
    </section>
    <!-- eind nav mobile -->
    <!--    end nav-->
    <!--    start header-->
    <header class="container-fluid" id="header">
           <div class = 'row justify-content-center justify-content-lg-around justify-content-xl-around  position-relative hed-info'>
              <div class="hed-pt1 col-12 col-lg-5 col-xl-5 pt-4 pt-4 justify-content-center justify-content-lg-around justify-content-xl-around ">
                 <h1 class="p-1 text-center"><?php echo $Premium_IPTV_Server ?></h1>
                 <h1 class="p-1 text-center"><?php echo $HD_Stable_No_Freeze ?></h1>
                 <p class="dscr mt-4 text-center"><?php echo $hed_pr1_p_1 ?></p>
                 <p class="dscr mt-4 text-center"><?php echo $hed_pr1_p_2 ?></p>
                 <div class="w-100 d-flex justify-content-center  justify-content-lg-center">
                     <button type="button" class="btn dscr rounded b-col4 col0  mt-4 text-center btn-scroll" data-targt = "iptvChanels"><?php echo $price_packages ?> </button>
                 </div>  
              </div>
              <!-- Trail form header-->
              <div class="hed-pt2 col-md-6 col-lg-4 col-xl-4 pt-4">
                 <form class="p-4 home-form" action="<?php echo url('/submit/Trail')?>" method="POST" data-res="trail-res">
                     <h4 class="text-center"><?php echo $form_1?></h4>
                     <p class="dscr text-center"><?php echo $form_data_1 ?></p>
                     <p class="dscr text-center"><?php echo $form_data_2 ?></p>
                     <div class="form-group">
                        <input type="text" 
                               class="form-control" 
                               pattern=".{3,9}"
                               name= "name" 
                               required
                               placeholder="<?php echo $name ?>">
                     </div>
                     <div class="form-group">
                        <input type="email" 
                               pattern=".{6,40}"
                               name="email" 
                               required
                               class="form-control" 
                               aria-describedby="emailHelp" 
                               placeholder="<?php echo $email ?>">
                     </div> 
                     <div class="form-group">
                        <input type="text" 
                               pattern=".{4,20}"
                               required
                               name="country"
                               class="form-control"  
                               placeholder="<?php echo $country ?>"
                               >
                     </div>
                     <div class="form-group">
                        <input type="text" 
                               pattern=".{4,20}"
                               required
                               name="Device-type"
                               class="form-control"  
                               placeholder="your Device"
                               >
                     </div>                                                             
                     <input type="submit" class="btn align-self-center w-100 rounded col0 "
                            <?php echo $trialBtn; ?> 
                            value="<?php echo $contentBtn ?>"
                            >
                     <div class="d-none justify-content-center mt-2"><p class="col0 rounded b-col2 p-2" id="trail-res"></p></div>
                 </form>
                 
              </div><!--end Trail form header-->
            </div>  
        <div class="layout"></div>    
    </header>
    <!--    end header-->

    <!--    start about-->
    <section class="about container mb-5" id="about">
        <div class="row rounded about-prop">
            <div class="col-6 col-sm-6 col-xs-6  col-md-3 d-flex flex-column border-right p-3">
                <i class="fas fa-cogs fa-3x d-flex justify-content-center"></i>
                <h3 class="d-flex justify-content-center mt-4"><?php echo $restream_channels; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_first_part1_p1; ?></p>
            </div>
            <div class="col-6  col-xs-6 col-md-3 d-flex flex-column border-right p-3">
                <i class="fas fa-paint-brush fa-3x d-flex justify-content-center"></i>
                <h3 class="d-flex justify-content-center mt-4"><?php echo $Hours_Trial; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_first_part1_p2; ?></p>
            </div>
            <div class="col-6  col-xs-6 col-md-3 d-flex flex-column border-right p-3">
                <i class="fab fa-algolia fa-3x  d-flex justify-content-center"></i>
                <h3 class="d-flex justify-content-center mt-4"><?php echo $uptime; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_first_part1_p3; ?></p>
            </div>
            <div class="col-6 col-md-3 d-flex flex-column p-3">
                <i class="fas fa-tv fa-3x d-flex justify-content-center"></i>
                <h3 class="d-flex justify-content-center mt-4"><?php echo $all_IPTV_devices; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_first_part1_p4; ?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <h1 class="mt-4 col-lg-auto text-center"><?php echo $who_we_are ?></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8"><p class="mt-4 text-center dscr2"><?php echo $about_first_part2_p ?></p></div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center w-100">
                <button type="button" class="btn rounded text-uppercase btn-scroll"  data-targt = "iptvChanels"><?php echo $check_store ?></button>
            </div>
        </div>
    </section>
    <!--    end about-->
    <!--    start offer section -->
    <section class="mt-5 offer mb-5" id="offer">
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="head col0 text-center"><?php echo $restler_channel ?></h2>
                    <h2 class="head col0 mb-3 text-center"><?php echo $price_2 ?></h2>
                    <a href="#" class="dscr2 text-white mt-3"><?php echo $section2_part_1_a ?></a>
                    <p class="dscr2 mt-3"><?php echo $section2_part_1_p ?></p>
                </div>
                <div class="offset-lg-3 col-lg-5">
                    <img alt="Responsive image" class ="mw-100 rounded" src="<?php echo assests('theme/imgs/unnamed.png'); ?>">
                </div>
            </div>
            <div class="row justify-content-end"><p class="dscr2 col-12 col-md-4  p-2 text-box rounded"><?php echo $section2_part_2_p1 ?></p></div>
        </div>
    </section>
    <!--    end offer section -->
    <!--    start about_offer section -->
    <section class="container about-offer mb-5" id="about-offer">
        <div class="row">
            <div class="col-12 d-flex justify-content-center"><h2 class= "head colWrH"><?php echo $about_offer_h?></h2></div>
            <div class=" col-12 d-flex justify-content-center mt-3">
                <div class="d-flex flex-column">
                    <p class="dscr2 text-center"><?php echo $about_offer_p1 ?></p>
                    <p class="dscr2 text-center"><?php echo $about_offer_p2 ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 col-md-3 d-flex flex-column border-right p-3"> 
                <i class="fas fa-lightbulb fa-4x d-flex justify-content-center col4"></i>
                <h3 class="d-flex justify-content-center mt-4 head colWrH text-center"><?php echo $about_offer_part2_1_h; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 coldscr2"><?php echo $about_offer_part2_1_p; ?></p>   
                <a  class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_offer_part2_1_a; ?></a>   
            </div>
            <div class="col-6 col-md-3 d-flex flex-column border-right p-3"> 
                <i class="fas fa-pencil-alt fa-4x d-flex justify-content-center col4"></i>
                <h3 class="d-flex justify-content-center mt-4 head colWrH text-center"><?php echo $about_offer_part2_2_h; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 coldscr2"><?php echo $about_offer_part2_2_p; ?></p>   
                <a  class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_offer_part2_2_a; ?></a>   
            </div>
            <div class="col-6 col-md-3 d-flex flex-column border-right p-3"> 
                <i class="far fa-money-bill-alt  fa-4x d-flex justify-content-center col4"></i>
                <h3 class="d-flex justify-content-center mt-4 head colWrH text-center"><?php echo $about_offer_part2_3_h; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 coldscr2"><?php echo $about_offer_part2_3_p; ?></p>   
                <a class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_offer_part2_3_a; ?></a>   
            </div>
            <div class="col-6 col-md-3 d-flex flex-column p-3"> 
                <i class="far fa-lightbulb fa-4x d-flex justify-content-center col4"></i>
                <h3 class="d-flex justify-content-center mt-4 head colWrH text-center"><?php echo $about_offer_part2_4_h; ?></h3>
                <p class="d-flex justify-content-center text-center mt-2 coldscr2"><?php echo $about_offer_part2_4_p; ?></p>   
                <a class="d-flex justify-content-center text-center mt-2 dscr"><?php echo $about_offer_part2_4_a; ?></a>   
            </div>       
        </div>
    </section>
    <!--    end about_offer section -->
    <!--    start customer section -->
    <section class="customer b-col3 mb-5 shadow" id="customer">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex flex-column ">
                    <h1 class="head col0 text-center"><?php echo $Little_bit ?></h1>
                    <p class="dscr mt-4 text-center"><?php echo $customer_part1_p1 ?></p>
                    <p class="dscr text-center"><?php echo $customer_part1_p2 ?></p>
                    <div class="d-flex justify-content-center btn-store">
                        <button type="button" class="btn rounded text-uppercase  b-col0 colWrH mt-3 btn-scroll" data-targt = "iptvChanels"><?php echo $check_store ?></button>
                    </div>    
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 row loop justify-content-center">
                   <div class="col-6 col-sm-6  border-bottom d-flex justify-content-center col0 rm row">
                       <p class=" num text-center col-12" limit ="2004">0</p>
                       <p class="mt-1 text-center col-12 dscr col0"><?php echo $Orders ?></p>
                   </div>
                    <div class="col-6 col-sm-6 border-left border-bottom d-flex justify-content-center col0 rm row">
                       <p class=" num text-center col-12" limit ="900">0</p>
                       <p class="mt-1 text-center col-12 dscr col0"><?php echo $Customers ?></p>
                   </div>
                    <div class="col-6 col-sm-6  d-flex justify-content-center col0 rm row">
                       <p class=" num text-center col-12" limit ="43123">0</p>
                       <p class="mt-1 text-center col-12 dscr col0"><?php echo $Followers ?></p>
                   </div>
                    <div class="col-6 col-sm-6  d-flex border-left justify-content-center col0 rm row" >
                       <p class="num text-center col-12" limit ="580">0</p>
                       <p class="mt-1 text-center col-12 dscr col0"><?php echo $tickets ?></p>
                   </div>
                </div>
            </div>
        </div>
    </section>
<!--    end customers-->
<!--    start what we offer can-->
    <section class="offering mt-5 mb-5 container pt-5" id="offering">
        <h1 class="text-center head colWrH "><?php echo $can_offer?></h1>
        <p class="dscr2 colWrH text-center mb-5 mt-3"><?php echo $offering_head_p ?></p>
        <div class="row">
            <div class="col-lg-6">
                <img alt="Responsive image" class ="mw-100 rounded" src="<?php echo assests('theme/imgs/bin.jpg'); ?>">
            </div>
            <div class="col-lg-6 f-flex felx-column chanels">
                <div class="d-flex flex-column p-2 mb-3 b-col1 pl-3 rounded">
                    <h4 class="p-2"><?php echo $eu ?></h4>
                    <p class="p-2 dscr2"><?php echo $eu_p ?></p>
                </div>
                <div class="d-flex flex-column p-2 mb-3 pl-3 b-col1 pl-3 rounded">
                    <h4 class="p-2"><?php echo $in ?></h4>
                    <p class=" p-2 dscr2"><?php echo $in_p ?></p>
                </div>
                <div class="d-flex  flex-column p-2 mb-3 pl-3 b-col1 pl-3 rounded">
                    <h4 class="p-2"><?php echo $usa ?></h4>
                    <p class=" p-2 dscr2"><?php echo $usa_p ?></p>
                </div>
                <div class="d-flex  flex-column p-2 pl-3 b-col1 pl-3 rounded">
                    <h4 class="p-2"><?php echo $latino ?></h4>
                    <p class=" p-2 dscr2"><?php echo $latino_p ?></p>
                </div>
            </div>
        </div>
    </section>
<!--    end what we offer can-->

<!--   start server Divices-->
   <section class="devices mt-5 mb-5 pt-5 shadow" id="devices">
       <div class="container">
           <div class="row">
               <h1 class="text-center head col0 col-12"><?php echo $devices_h?></h1>
               <p class="dscr2 coldscr2 text-center mb-5 mt-3 col-8 col-12"><?php echo $devices_p?></p>
               <div class="col-12 col-md-6 pb-5 pt-2">
                   <img alt="Responive image" class ="mw-100 mt-4 rounded" src="<?php echo assests('theme/imgs/iptv-server.png'); ?>">
               </div>
               <div class="col-12 col-md-6 d-flex flex-column prob">
                   <p class="p-2"><i class="fas fa-check fa-2x pr-2 col0"></i><?php echo $devices_part_p1 ?></p>
                   <p class="p-2"><i class="fas fa-check fa-2x pr-2 col0"></i><?php echo $devices_part_p2 ?></p>
                   <p class="p-2"><i class="fas fa-check fa-2x pr-2 col0"></i><?php echo $devices_part_p3 ?></p>
                   <p class="p-2"><i class="fas fa-check fa-2x pr-2 col0"></i><?php echo $devices_part_p4 ?></p>
                   <p class="p-2"><i class="fas fa-check fa-2x pr-2 col0"></i><?php echo $devices_part_p5 ?></p>
                   <p class="p-2"><i class="fas fa-check fa-2x pr-2 col0"></i><?php echo $devices_part_p6 ?></p>
               </div>
           </div>
       </div>
   </section>
<!--   end server Divices-->

<!--   start reseller offering-->
    <section class="reseller container mt-5 mb-5 d-none" id="resseller">
        <div class="row">
            <h1 class="text-center head col3 col-12 text-center colWrH"><?php echo $reseller_part1_h ?></h1>
            <p class="dscr2 coldscr2 text-center mt-3 col-8 offset-2"><?php echo $reseller_part1_p1 ?></p>
            <p class="dscr2 coldscr2 text-center col-8 offset-2 mb-5"><?php echo $reseller_part1_p2 ?></p>
        </div>    
        <div class="row ">
            <div class="col-lg-6 d-flex flex-column mt-5 pt-5">
                <h1 class="head colWrH"><?php echo $reseller_part1_h ?></h1>
                <p class="p-2"><i class="fas fa-check fa-2x pr-2 col3"></i><?php echo $reseller_part2_p1  ?></p>
                <p class="p-2"><i class="fas fa-check fa-2x pr-2 col3"></i><?php echo $reseller_part2_p2  ?></p>
                <p class="p-2"><i class="fas fa-check fa-2x pr-2 col3"></i><?php echo $reseller_part2_p3  ?></p>
                <p class="p-2"><i class="fas fa-check fa-2x pr-2 col3"></i><?php echo $reseller_part2_p4  ?></p>
                <p class="p-2 mt-3"><?php echo $reseller_part2_p5  ?> <a href="#"> <?php echo $reseller_part2_i ?></a></p>
            </div>  
            <div class="col-lg-6 rsr-cards row mt-3">
               <div class="col-lg-6 pb-3">
                  <div class="card text-white text-center p-2">  
                    <h3 class="col0"><?php echo $reseller_cards_c1_h ?></h3> 
                    <small class="col2  mb-2 pb-2 border-bottom">XTREAMCODES PANEL</small>
                    <blockquote class="blockquote mb-0 mt-2">
                      <p class="colWr2"><?php echo $reseller_cards_c1_p ?></p>
                      <footer class="">
                        <button type="button" class="btn rounded text-uppercase  b-col0 colWrH"><?php echo $check_store ?></button>
                      </footer>
                    </blockquote>
                    <div class="layout"></div>
                  </div>
                </div>
                <div class="col-lg-6 pb-3">
                  <div class="card text-white text-center p-2">  
                    <h3 class="col0"><?php echo $reseller_cards_c2_h ?></h3> 
                    <small class="col2 mb-2 pb-2 border-bottom">XTREAMCODES PANEL</small>
                    <blockquote class="blockquote mb-0 mt-2">
                      <p class="colWr2"><?php echo $reseller_cards_c2_p ?></p>
                      <footer class="">
                        <button type="button" class="btn rounded text-uppercase  b-col0 colWrH"><?php echo $check_store ?></button>
                      </footer>
                    </blockquote>
                    <div class="layout"></div>
                  </div>
                </div>
                <div class="col-lg-6 pb-3">
                  <div class="card text-white text-center p-2">  
                    <h3 class="col0"><?php echo $reseller_cards_c3_h ?></h3> 
                    <small class="col2 mb-2 pb-2 border-bottom">XTREAMCODES PANEL</small>
                    <blockquote class="blockquote mb-0 mt-2">
                      <p class="colWr2"><?php echo $reseller_cards_c3_p ?></p>
                      <footer class="">
                        <button type="button" class="btn rounded text-uppercase  b-col0 colWrH"><?php echo $check_store ?></button>
                      </footer>
                    </blockquote>
                    <div class="layout"></div>
                  </div>
                </div>
                <div class="col-lg-6 pb-3">
                  <div class="card text-white text-center p-2">  
                    <h3 class="col0"><?php echo $reseller_cards_c4_h ?></h3> 
                    <small class="col2 mb-2 pb-2 border-bottom">XTREAMCODES PANEL</small>
                    <blockquote class="blockquote mb-0 mt-2">
                      <p class="colWr2"><?php echo $reseller_cards_c4_p ?></p>
                      <footer class="">
                        <button type="button" class="btn rounded text-uppercase  b-col0 colWrH"><?php echo $check_store ?></button>
                      </footer>
                    </blockquote>
                    <div class="layout"></div>
                  </div>
                </div>
            </div>
        </div>
    </section>
<!--   end resller offering-->

<!--   start iptvChannels -->
    <section class="iptvChanels mt-5 pt-5 mb-5" id="iptvChanels">
        <div class="container">
            <div class="row">
                <h1 class="text-center head col-12 text-center colWrH"><?php echo $iptv_channels_h ?></h1>
                <p class="dscr2 coldscr2 text-center mt-3 col-8 mx-auto"><?php echo $iptv_channels_p ?></p>
                <a href="#" class="dscr2 col4 text-center col-8 mx-auto mb-5"><?php echo $iptv_channels_a ?></a>
            </div>
            <div class="row">
                <div class="justify-content-center justify-content-md-around  col-12 row pb-5 noMR">

                    
                    <?php echo $offers; ?>

                </div>
            </div>
        </div>    
    </section>
<!--end itpv iptvChannels-->

<!--start contact form-->
    <section class="contact mt-5 pt-5 b-col3 pb-5 shadow" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex flex-column border-right">
                    <div class="firma">
                        <h3 class="text-uppercase head col0">best-iptv</h3>
                        <span class="colWr2"><?php echo $contact_part1_p1 ?></span>
                    </div>
                    <div class="meet mt-3">
                        <h3 class="text-uppercase head col0"><?php echo $contact_part1_h2 ?></h3>
                        <span class="colWr2"><?php echo $contact_part1_p2 ?></span>
                    </div>
                    <div class="contact mt-3 d-flex flex-column">
                        <h3 class="text-uppercase head col0"><?php echo $contact_part1_h3 ?></h3>
                        <span class="colWr2">Phone : +44 74480445231</span>
                        <span class="colWr2">Email : best@best-iptv4k.com</span>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1 form">
                  <form class="home-form" action ="<?php echo url('/submit/contact'); ?>" method="POST" data-res="contact-res">
                      <h4 class="text-uppercase head col0"><?php echo $contact_part2_h ?></h4>
                      <div class="row mt-3">
                          <div class="form-group col-lg-6">
                            <label for="name-field" class="col0">Name</label>  
                            <input type="text"
                                   name ="name"
                                   id = "name-field"
                                   required
                                   pattern =".{2,15}"
                                   class="form-control" 
                                   aria-describedby="emailHelp" 
                                   placeholder="name">
                          </div>
                          <div class="form-group col-lg-6">
                            <label for="email-filed" class="col0">Email</label>  
                            <input type="email"
                                   name = "email"
                                   required
                                   pattern =".{6,40}"
                                   class="form-control" 
                                   aria-describedby="emailHelp" 
                                   placeholder="Email">
                          </div>
                          <div class="form-group col-lg-6">
                            <label for="phone-filed" class="col0">phone</label>
                            <input type="text"
                                   name ="phone"
                                   id = "phone"
                                   pattern =".{2,15}"
                                   class="form-control"  
                                   placeholder="Phone">
                          </div> 
                          <div class="form-group col-lg-6">
                            <label for="subjeck-filed" class="col0">subject</label>
                            <input type="text"
                                   name = "subject"
                                   id='subjeck-filed'
                                   pattern =".{2,15}"
                                   required
                                   class="form-control"  
                                   placeholder="subject">
                          </div>
                         <div class="form-group col-lg-12">
                             <label for="text-area" class="col0">Your Message</label>
                             <textarea class="form-control" 
                                       rows="3" 
                                       id = "text-area"
                                       pattern =".{2,15}"
                                       required
                                       name = "msg"
                                       placeholder=" massage Content"></textarea>
                         </div>
                    </div>
                     <input type="submit" class="btn align-self-center w-100 b-col0 col3 rounded " value="<?php echo $send_msgs ?>">
                     <div class="d-none justify-content-center mt-2 w-100"><p class="col0 rounded text-center  p-2 w-75" id="contact-res"></p></div>   
                 </form>
                </div>
            </div>
        </div>
    </section>



<!-- Modal -->
<div class="modal fade" id="bay_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">IPTV connections packages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="LZPTM74PURPV4">
                <table class="justify-content-center row">
                    <tr>
                        <td><input type="hidden" name="on0" value="iptv connections packages"></td>
                    </tr>
                    <tr>
                        <td>
                           <select name="os0" class="mt-4 selector-bay" id ='bay-select'>
                                <option value="1 month">1 month €10,00 EUR</option>
                                <option value="3 month">3 month €20,00 EUR</option>
                                <option value="6 month">6 month €30,00 EUR</option>
                                <option value="9 month">9 month €40,00 EUR</option>
                                <option value="1 year">1 year €50,00 EUR</option>
                           </select> 
                        </td>
                    </tr>
                </table>
                <div class="row justify-content-center mt-4">
                <input type="hidden" name="currency_code" value="EUR" class="mt-4">
                <input type="image" src="https://www.paypalobjects.com/en_US/DE/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="2" height="2">
     
          </div>
          </div>
    </div>
   </form>    
  </div>
</div>

<!--end contact form-->
<?php echo $footer; ?>
