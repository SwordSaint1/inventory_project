<div class="modal fade" id="import_borrower" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Import Borrower's Details</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-12">
        <form action="../../process/import.php"  enctype="multipart/form-data" method="POST">
          <input type="hidden" name="id_number_fsib" id="id_number_fsib" value="<?=$id_number;?>">
                    <label>File:</label>
                    <input type="file" name="file" class="form-control-lg" accept=".csv">
        </div>
      </div>
      <br>
      <hr>
      <div class="row"> 
        <div class="col-6">
          <div class="float-left">
            <a href="../../template/template.csv" class="btn btn-success">Download Template&ensp;<i class="fa fa-download"></i></a>
          </div>
        </div>
        <div class="col-6">
          <div class="float-right">
           <input type="submit" class="btn btn-primary" name="upload" value="Upload Data">
          </div>
        </div>
      </div>
      </div>
      
         </form>
    </div>
  </div>
</div>