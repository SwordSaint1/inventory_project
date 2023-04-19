<div class="modal fade" id="add_equipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add Equipment</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <span><b>Equipment Name:</b></span>
            <input type="text" id="equip_name_add" class="form-control" autocomplete="off" style="height:45px; border: 1px solid black; font-size: 25px;">
          </div>
           <div class="col-6">
            <span><b>Description:</b></span>
            <input type="text" id="description_add" class="form-control" autocomplete="off" style="height:45px; border: 1px solid black; font-size: 25px;">
          </div>
        </div>
         <div class="row">
          <div class="col-6">
            <span><b>Quantity:</b></span>
            <input type="number" id="quantity_add" class="form-control" onkeypress="return event.charCode >= 48" min="1" style="height:45px; border: 1px solid black; font-size: 25px;">
          </div>
           <div class="col-6">
            <span><b>Status:</b></span>
            <select id="status_add" class="form-control" style="height:45px; border: 1px solid black; font-size: 25px;">
                <option value="">Select Status</option>
                <option value="available">Available</option>
                <option value="not_available">Not Available</option>
              </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <a href="#" class="btn btn-primary" onclick="save_equipment()">Save Data</a>       
      </div>
    </div>
  </div>
</div>