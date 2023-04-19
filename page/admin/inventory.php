<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/inventorybar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory Management</h1>
            <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Inventory Management</li>
            </ol>
          </div><!-- /.col -->
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <!-- Button trigger modal -->
            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#add_equipment">Add Equipment</a>
            </ol>
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
                <h3 class="card-title">
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                   <div class="row">
                    <div class="col-3">
                    <label>Equipment Name:</label> <input type="text" id="equipment_name_user_search" class="form-control">
                    </div>
                     <div class="col-3">
                    <label>Status:</label>
                    <select id="status_search" class="form-control">
                      <option value="">Select Status</option>
                      <option value="available">Available</option>
                      <option value="not_available">Not Available</option>
                    </select>
                    </div>
                     <div class="col-6">
                      <span style="visibility:hidden;">.</span>
                      <p style="text-align:right;"><a href="#" class="btn btn-primary" onclick="load_inventory()">Search <i class="fa fa-search"></a></i></p>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                       <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Equipment</th>
                    <th>Quantity</th>
                    <th>Status</th>
            </thead>
            <tbody id="list_of_equipments" style="text-align:center;"></tbody>
                </table>
                 <div class="row">
                  <div class="col-6"></div>
                  <div class="col-6">   
                    <div class="spinner" id="spinner" style="display:none;">
                      <div class="loader float-sm-center"></div>    
                    </div>
                  </div>
                </div>
              </div>
              </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                
                </div>
              </form>
            </div>
            <!-- /.card -->

</div>
</div>
</div>
</section>
</div>

<?php include 'plugins/footer.php';?>
<?php include 'plugins/javascript/inventory_script.php';?>
