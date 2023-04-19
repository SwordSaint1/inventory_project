<script type="text/javascript">
	
const load_inventory =()=>{
    $('#spinner').css('display','block');
    var equip_name = document.getElementById('equipment_name_user_search').value;
	var status = document.getElementById('status_search').value;
	$.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'inventory_list',
            equip_name:equip_name,
			status:status
        },success:function(response){
            $('#list_of_equipments').html(response);
            $('#spinner').fadeOut();
        }
    });
}

const save_equipment =()=>{
	var equip_name = document.getElementById('equip_name_add').value;
	var description = document.getElementById('description_add').value;
	var quantity = document.getElementById('quantity_add').value;
	var status = document.getElementById('status_add').value;

	$.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'add_equipment',
            equip_name:equip_name,
			description:description,
			quantity:quantity,
			status:status
        },success:function(response){
            if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Recorded!!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $("#equip_name_add").val('');
					$("#description_add").val('');
					$("#quantity_add").val('');
					$("#status_add").val('');
					load_inventory();
					$('#add_equipment').modal('hide');
            }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error !!!',
                      text: 'Error',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $("#equip_name_add").val('');
                    $("#description_add").val('');
                    $("#quantity_add").val('');
                    $("#status_add").val('');
                    load_inventory();
                    $('#add_equipment').modal('hide');             
                }
        }
    });
}
</script>