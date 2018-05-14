<?php
echo $header . $nav;
?>

<h1 class="text-center colWrH page-title">Visters</h1>
<section class="container">
    <table class="table mt-5 table-bordered">
      <thead class="thead-dark text-center">
        <tr> 	            
          <th scope="col">#</th>
          <th scope="col">Country</th>
          <th scope="col">City</th>
          <th scope="col">Device</th>
          <th scope="col">vist_time</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody class="text-center" id="ajx-content">
          <?php echo $visters; ?>
      </tbody>
    </table>
</section>

<?php
echo $footer;
?>
