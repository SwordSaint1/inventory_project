<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/accountsbar.php';?>
  <!-- Main Sidebar Container -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Account Management</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
             <div class="row">
      <div class="col-3">
        <br>
        <a href="#" class="btn btn-secondary modal-trigger" data-toggle="modal" data-target="#new_account">Register Account</a>
      </div>
    </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
<div class="card-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <span>Fullname:</span>
        <input type="text" id="fname_search" class="form-control" autocomplete="off">
      </div>
      <div class="col-9">
        <div class="float-right">
          <a href="#" class="btn btn-primary" onclick="search_account()">Search&ensp;<i class="fa fa-search"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
         <div class="col-12">
            <div class="card-body table-responsive p-0" style="height: 420px;">
              <table class="table table-head-fixed text-nowrap table-hover" id="">
                  <thead style="text-align:center;">
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                  </thead>
                  <tbody id="list_of_accounts" style="text-align:center;"></tbody>
              </table>
              </div>
          </div>
         
  <!-- end row -->
    </div>
   <!-- end container -->
  </div>

</div>
        <!-- /.card-body -->

                <div class="card-footer">
               
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'plugins/footer.php';?>
<?php include 'plugins/javascript/accounts_script.php';?>