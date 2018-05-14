<?php
echo $header . $nav;
?>

<h1 class="text-center colWrH page-title">Requirement</h1>
<section class="container">
    <div class="justify-content-end row mt-5">
        <div class="col-4">
          <input type="text" class="form-control search-in" data-search='#ajx-content tr' placeholder="Search">
        </div>
    </div>    
    <table class="table mt-0 table-bordered">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">NAME</th>
          <th scope="col">Email</th>
          <th scope="col">Mal</th>
          <th scope="col">Amount</th>
          <th scope="col">device</th>
          <th scope="col">Country</th>    
          <th scope="col">Ext_Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="text-center" id="ajx-content">
          
          <?php echo $req; ?>
      </tbody>
    </table>
</section>


<div class="modal fade" id="send-msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered col-12" role="document">
        <div class="modal-content">
            <form class="" id="formy" action="<?php echo url('/hmzd/req/sendMsg')?>" method="POST" data-res="ajx-content">
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
<?php
echo $footer;
?>
