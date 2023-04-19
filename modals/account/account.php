<div class="modal fade bd-example-modal-xl" id="new_account" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Register Account</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-4">
            <label>Full Name:</label>
            <input type="text" id="full_name_add" class="form-control" autocomplete="off">
          </div>
          <div class="col-4">
            <label>Username:</label>
            <input type="text" id="username_add" class="form-control" autocomplete="off">
          </div>
           <div class="col-4">
            <label>Password:</label>
            <input type="password" id="password_add" class="form-control" autocomplete="off">
          </div>
        </div>
        <br>
        <hr>
        <div class="row">
          <div class="col-12">
            <div class="float-right">
              <a href="#" class="btn btn-primary" onclick="register_account()">Register Account</a>
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

