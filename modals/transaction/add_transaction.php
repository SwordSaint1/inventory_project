<div class="modal fade bd-example-modal-xl" id="add_transaction" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Transaction Details</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-4">
            <label>ID Number:</label>
            <select id="id_number_transact" class="form-control" style="height:45px; border: 1px solid black; font-size: 25px;" onchange="suggest()">
              <option value="">Select ID Number</option>
              <?php 
              require '../../process/conn.php';
              $query = "SELECT DISTINCT id_number FROM borrower_details ORDER BY id_number ASC";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              if ($stmt->rowCount() > 0) {
                foreach($stmt->fetchALL() as $j){
                  echo '<option value="'.$j['id_number'].'">'.$j['id_number'].'</option>';
                }
              }

              ?>
            </select>
          </div>
          <div class="col-4">
            <label>Borrower's Name:</label>
            <input type="text" id="borrowers_name_transact" class="form-control" autocomplete="off" style="height:45px; border: 1px solid black; font-size: 25px;" readonly>
          </div>
           <div class="col-4">
            <label>Department:</label>
            <input type="text" id="department_transact" class="form-control" autocomplete="off" style="height:45px; border: 1px solid black; font-size: 25px;" readonly>
          </div>
        </div>
         <div class="row">
           <div class="col-4">
            <label>Equipment Name:</label>
            <select id="equip_transact" class="form-control" autocomplete="off" style="height:45px; border: 1px solid black; font-size: 25px;">
              <option value="">Select Equipment</option>
              <?php 
              require '../../process/conn.php';
              $query = "SELECT DISTINCT equipment FROM equipment WHERE status = 'available' AND qty > 0 ORDER BY equipment ASC";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              if ($stmt->rowCount() > 0) {
                foreach($stmt->fetchALL() as $j){
                  echo '<option value="'.$j['equipment'].'">'.$j['equipment'].'</option>';
                }
              }
              ?>
            </select>
          </div>
          <div class="col-4">
            <label>Quantity:</label>
             <input type="number" id="quantity_transact" class="form-control" onkeypress="return event.charCode >= 48" min="1" style="height:45px; border: 1px solid black; font-size: 25px;">
          </div>
        </div>
        <br>
        <hr>
        <div class="row">
          <div class="col-12">
            <div class="float-right">
              <a href="#" class="btn btn-primary" onclick="transact()">Transact</a>
            </div>
          </div>
        </div>
      <!-- /.card-body -->
      </div>
            <!-- /.card -->
          </div>
        </div>
           
      </div>
    </div>
  </div>
</div>

