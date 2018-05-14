<?php
echo $header . $nav;
?>

<h1 class="text-center colWrH page-title">CCCAM</h1>
<section class="container">
    <table class="table mt-5 table-bordered">
      <tbody class="text-center" id="ajx-content">
         <?php echo $cccam; ?>
      </tbody>
    </table>
</section>

<div class="modal fade" id="update-Seo-dscr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered col-12" role="document">
        <div class="modal-content">
            <form class="" id="formy" action="<?php echo url('/hmzd/cccam/update-code')?>" method="POST" data-res="ajx-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="up1">Code</label>
                        <textarea id="up_dscr" class="form-control" name="up_dscr" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="ajx-btn" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
echo $footer;
?>