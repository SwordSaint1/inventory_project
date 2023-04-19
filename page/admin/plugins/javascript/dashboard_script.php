<script type="text/javascript">
$( document ).ready(function() {

});	

const suggest =()=>{
    var id_number =  document.getElementById('id_number_transact').value;
    $.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'get_details',
            id_number:id_number
        },success:function(data){
             var data = data.split('~!~');
             var borrowers_name = data[0];
             var department = data[1];
            $('#borrowers_name_transact').val(borrowers_name);
            $('#department_transact').val(department);
        }
    });
}

const load_transcations =()=>{
    $('#spinner').css('display','block');
    var borrower = document.getElementById('borrower_transact').value;
    var status = document.getElementById('status_transact').value;
    $.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'transaction_list',
            borrower:borrower,
            status:status
        },success:function(response){
            $('#list_of_transactions').html(response);
            $('#spinner').fadeOut();
        }
    });
}

const get_transaction_details =(param)=>{
 var string = param.split('~!~');
    var id = string[0];
    var equipment = string[1];
    var borrowed_qty = string[2];
    var status = string[3];
    var borrowers_name = string[4];
    var department = string[5];

    document.getElementById('id_transact_update').value = id;
    document.getElementById('borrowers_name_transact_update').value = borrowers_name;
    document.getElementById('department_transact_update').value = department;
    document.getElementById('equip_transact_update').value = equipment;
    document.getElementById('quantity_transact_update').value = borrowed_qty;
    document.getElementById('status_update').value = status;
}

const transact =()=>{
    
    Swal.fire({
      title: 'Are you sure you want to transact?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
            var id_number = document.getElementById('id_number_transact').value;
            var borrowers_name = document.getElementById('borrowers_name_transact').value;
            var department = document.getElementById('department_transact').value;
            var equip = document.getElementById('equip_transact').value;
            var quantity = document.getElementById('quantity_transact').value;
            $.ajax({
                url:'../../process/processor.php',
                type:'POST',
                cache:false,
                data:{
                    method:'transact',
                    id_number:id_number,
                    borrowers_name:borrowers_name,
                    department:department,
                    equip:equip,
                    quantity:quantity
                },success:function(response){
                    if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Transact !!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $("#id_number_transact").val('');
                    $("#borrowers_name_transact").val('');
                    $("#department_transact").val('');
                    $("#equip_transact").val('');
                    $("#quantity_transact").val('');
                    load_transcations();
                    $('#add_transaction').modal('hide');
                    }else{
                            Swal.fire({
                              icon: 'error',
                              title: 'Error !!!',
                              text: 'Error',
                              showConfirmButton: false,
                              timer : 1000
                            });
                    $("#id_number_transact").val('');
                    $("#borrowers_name_transact").val('');
                    $("#department_transact").val('');
                    $("#equip_transact").val('');
                    $("#quantity_transact").val('');
                    load_transcations();
                    $('#add_transaction').modal('hide');          
                    }
                }
            });
      }
    })
}

const returned =()=>{
     Swal.fire({
      title: 'Are you sure you want to update transaction?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
            var id = document.getElementById('id_transact_update').value;
            var equip = document.getElementById('equip_transact_update').value;
            var quantity = document.getElementById('quantity_transact_update').value;
            var status = document.getElementById('status_update').value;
            $.ajax({
                url:'../../process/processor.php',
                type:'POST',
                cache:false,
                data:{
                    method:'returned',
                    id:id,
                    equip:equip,
                    quantity:quantity,
                    status:status
                },success:function(response){
                    if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Returned !!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    load_transcations();
                    $('#update_transaction').modal('hide');
                    }else{
                            Swal.fire({
                              icon: 'error',
                              title: 'Error !!!',
                              text: 'Error',
                              showConfirmButton: false,
                              timer : 1000
                            });
                    load_transcations();
                    $('#update_transaction').modal('hide');          
                    }
                }
            });
      }
    })
}
</script>