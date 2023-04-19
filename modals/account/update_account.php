<div class="modal fade bd-example-modal-xl" id="update_accounts_user" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Update Account</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <label>Full Name:</label>
            <input type="text" id="full_name_update" class="form-control" autocomplete="off">
          </div>
          <div class="col-4">
            <label>Username:</label>
            <input type="hidden" id="id_update" class="form-control">
            <input type="text" id="username_update" class="form-control" autocomplete="off">
          </div>
           <div class="col-4">
            <label>Password:</label>
            <input type="password" id="password_update" class="form-control" autocomplete="off">
          </div>
        </div>
        <br>
        <hr>
         <div class="row">
          <div class="col-12">
            <div class="float-right">
              <a href="#" class="btn btn-danger" onclick="delete_account()">Delete Account</a>
              &ensp;&ensp;&ensp;
              <a href="#" class="btn btn-primary" onclick="update_account()">Update Account</a>
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

