<?php

echo $header . $nav;
?>
<section class="nums container mb-5">
    <h1 class="text-center mb-5 colWrH">Dashboard</h1>
    <div class="row justify-content-around mb-5">
        <a href="<?php echo url('/hmzd/customers')?>" >    
            <div class="fact b-colWrH p-3 rounded col0">
                <h1 class="text-center mb-3 "><?php echo $cos ?></h1>
                <h3 class="text-center ">Custumers</h3>
            </div>
        </a>  
        <a href="<?php echo url('/hmzd/req')?>" class="col-2"> 
            <div class="fact b-colWrH p-3 rounded col0">
                <h1 class="text-center mb-3 "><?php echo $reqs ?></h1>
                <h3 class="text-center ">Req</h3>
            </div>
        </a> 
        <a href="<?php echo url('/hmzd/trails')?>" class="col-2"> 
            <div class="act b-colWrH p-3 rounded col0">
                <h1 class="text-center mb-3 "><?php echo $trails ?></h1>
                <h3 class="text-center ">Trails</h3>
            </div>
        </a>
        <a href="<?php echo url('/hmzd/visters')?>" class="col-2"> 
            <div class="act b-colWrH p-3 rounded col0">
                <h1 class="text-center mb-3 "><?php echo $visters; ?></h1>
                <h3 class="text-center ">Visters</h3>
            </div>
        </a>
    </div>
    <div class="row justify-content-around mt-5">
        <a href="<?php echo url('/hmzd/trails')?>" class="col-2"> 
           <div class="fact  col0 b-col3 p-3 rounded ">
                <h1 class="text-center mb-3 "><?php echo $TrailsPlus; ?></h1>
                <h3 class="text-center ">Trails +1</h3>
           </div>
        </a>
    </div>
    <div class="row justify-content-around mt-5">
        <a href="<?php echo url('/hmzd/profits')?>" class="col-3"> 
        <div class="act b-colWrH p-3 rounded col0 ">
            <h1 class="text-center mb-3 "><?php echo $prof; ?>€</h1>
            <h3 class="text-center ">Profits</h3>
        </div>
        </a>    
    </div>
</section>


<section class="tables container mt-5">
    <div class="row justify-content-around">
        <div class="req col-5">
            <h3 class="text-center b-col3 col0 m-0 p-3">Trails</h3>
            <table class="table table-striped">
              <thead class="thead-dark ">
                <tr>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="ajx-contentTrails" class="text-center">
                  <?php echo $trailsTable; ?>
              </tbody>
            </table>
        </div> 
        <div class="col-5">
            <h3 class="text-center b-col3 col0 m-0 p-3">Requirement</h3>
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Email</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="ajx-contentRqs" class="text-center">
                   <?php echo $reqsTable; ?>
              </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="send-trail-msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered col-12" role="document">
        <div class="modal-content">
            <form class="" id="formy" action="<?php echo url('/hmzd/dashboard/sendTrailMsg')?>" method="POST" data-res="ajx-contentTrails">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" style="display:none;" id="email" name="email">
                        <label for="send-massage">Message</label>
                        <textarea id="send-massage" class="form-control" name="msg" required></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="ajx-btn" class="btn btn-primary ">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="send-req-msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered col-12" role="document">
        <div class="modal-content">
            <form class="" id="formy" action="<?php echo url('/hmzd/dashboard/sendReqMsg')?>" method="POST" data-res="ajx-contentRqs">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" style="display:none;" id="email2" name="email2">
                        <label for="send-massage">Message</label>
                        <textarea id="send-massage" class="form-control" name="msg" required></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="ajx-btn" class="btn btn-primary ">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
echo $footer
?>