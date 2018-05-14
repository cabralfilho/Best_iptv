
<?php
echo $header . $nav;
?>

<h1 class="text-center colWrH page-title">Offers</h1>
<section class="container">
    <div class="add-offer d-flex flex-row-reverse">
        <i class="fas fa-plus-square fa-4x p-2" data-toggle="modal" data-target="#add-offer"></i>
    </div>
    <table class="table mt-5 table-bordered">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col">Price</th>
          <th scope="col">Price-type</th>
          <th scope="col">duration_num</th>
          <th scope="col">duration_type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="text-center" id="ajx-content">
         <?php echo $offers; ?>
      </tbody>   
   
    </table>
    
</section>


<!-- Modal -->
<div class="modal fade" id="add-offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title " id="exampleModalLongTitle">Add New Offer</h5>
            </div>
            <form class="p-4 " id="formy" action="<?php echo url('/hmzd/offers/addoffers')?>" method="POST" data-res="ajx-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="offer1">Price</label>
                        <input type="text" id="offer1" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="offer2">Price-type</label>
                        <input id="offer2" name="price-type" required class="form-control" aria-describedby="emailHelp" placeholder="<?php ?>">
                    </div>
                    <div class="row p-2">
                        <div class="col-2 mr-3">
                            <p class="radio-title text-center  ">duration_type</p>
                        </div>
                        <div class="col-8 row offset-1 justify-content-center">
                            <div class="custom-control custom-radio  col-3 mr-3">
                                <input type="radio" id="hnr1" name="duration_type" class="custom-control-input radio" value="year">
                                <label class="custom-control-label" for="hnr1">Year</label>
                            </div>
                            <div class="custom-control custom-radio  col-3 mr-3">
                                <input type="radio" id="hnr2" name="duration_type" checked class="custom-control-input radio" value="month">
                                <label class="custom-control-label" for="hnr2" >Month</label>
                            </div>
                            <div class="custom-control custom-radio  col-3 mr-3">
                                <input type="radio" id="hnr3" name="duration_type" class="custom-control-input radio" value="day">
                                <label class="custom-control-label" for="hnr3">Day</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="offer4">duration_num</label>
                        <input type="text" id="offer4" required name="duration_num" class="form-control" placeholder="<?php  ?>">
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="ajx-btn" class="btn btn-primary ">Add Offer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add new offer Modal -->

<!-- start update offer Modal -->

<div class="modal fade" id="update-offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title " id="exampleModalLongTitle">Update Offer</h5>
            </div>
            <form class="p-4 " id="formy" action="<?php echo url('/hmzd/offers/updateOffers')?>" method="POST" data-res="ajx-content">
                <div class="modal-body">
                    <input type="text" value="" name="id" id="up-id" style="display:none;">
                    <div class="form-group">
                        <label for="offer1">Price</label>
                        <input type="text" id="up1" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="offer2">Price-type</label>
                        <input id="up2" name="price-type" required class="form-control" aria-describedby="emailHelp" placeholder="<?php ?>">
                    </div>
                    <div class="row p-2">
                        <div class="col-2 mr-3">
                            <p class="radio-title text-center">duration_type</p>
                        </div>
                        <div class="col-8 row offset-1 justify-content-center">
                            <div class="custom-control custom-radio  col-3 mr-3">
                                <input type="radio" id="hnr11" name="duration_type" class="custom-control-input radio" value="year">
                                <label class="custom-control-label" for="hnr11">Year</label>
                            </div>
                            <div class="custom-control custom-radio  col-3 mr-3">
                                <input type="radio" id="hnr22" name="duration_type" checked class="custom-control-input radio" value="month">
                                <label class="custom-control-label" for="hnr22" >Month</label>
                            </div>
                            <div class="custom-control custom-radio  col-3 mr-3">
                                <input type="radio" id="hnr33" name="duration_type" class="custom-control-input radio" value="day">
                                <label class="custom-control-label" for="hnr33">Day</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="offer4">duration_num</label>
                        <input type="text" id="up4" required name="duration_num" class="form-control" placeholder="<?php  ?>">
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="ajx-btn" class="btn btn-primary ">Update offer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end update offer Modal -->
<?php
echo $footer;
?>