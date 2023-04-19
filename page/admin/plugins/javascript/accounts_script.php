<script type="text/javascript">
$( document ).ready(function() {
     load_accounts();
});		

const load_accounts =()=>{
    $('#spinner').css('display','block');
    var fname = document.getElementById('fname_search').value;
	$.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'account_list',
            fname:fname
        },success:function(response){
            $('#list_of_accounts').html(response);
            $('#spinner').fadeOut();
        }
    });
}

const register_account =()=>{
	var username = document.getElementById('username_add').value;
	var password = document.getElementById('password_add').value;
	var full_name = document.getElementById('full_name_add').value;

	$.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'register_account',
            username:username,
            password:password,
            full_name:full_name
        },success:function(response){
            if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Recorded!!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $("#username_add").val('');
					$("#password_add").val('');
					$("#full_name_add").val('');
					load_accounts();
					$('#new_account').modal('hide');
            }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error !!!',
                      text: 'Error',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $("#username_add").val('');
                    $("#password_add").val('');
                    $("#full_name_add").val('');
                    load_accounts();
                    $('#new_account').modal('hide');             
                }
        }
    });
}

const get_accounts_details =(param)=>{
 var string = param.split('~!~');
    var id = string[0];
	var full_name = string[1];
    var username = string[2];
	var password = string[3];

	document.getElementById('id_update').value = id;
	document.getElementById('username_update').value = username;
	document.getElementById('full_name_update').value = full_name;
	document.getElementById('password_update').value = password;
}

const update_account =()=>{
var id = document.getElementById('id_update').value;
var username = document.getElementById('username_update').value;
var full_name = document.getElementById('full_name_update').value;
var password = document.getElementById('password_update').value;

$.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'update_account',
            id:id,
            username:username,
			password:password,
			full_name:full_name
        },success:function(response){
            if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Succesfully Recorded!!!',
                      text: 'Success',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $("#username_update").val('');
					$("#password_update").val('');
					$("#full_name_update").val('');
					load_accounts();
					$('#update_accounts_user').modal('hide');
            }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error !!!',
                      text: 'Error',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    $("#username_update").val('');
                    $("#password_update").val('');
                    $("#full_name_update").val('');
					load_accounts();
					$('#update_accounts_user').modal('hide');             
                }
        }
    });
}

const delete_account =()=>{
	var id = document.getElementById('id_update').value;
	$.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'delete_account',
            id:id
        },success:function(response){
            if (response == 'success') {
                    Swal.fire({
                      icon: 'info',
                      title: 'Succesfully Deleted !!!',
                      text: 'Information',
                      showConfirmButton: false,
                      timer : 1000
                    });
                    load_accounts();
                    $('#update_accounts_user').modal('hide');
            }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Error !!!',
                      text: 'Error',
                      showConfirmButton: false,
                      timer : 1000
                    });  
                    load_accounts();
                    $('#update_accounts_user').modal('hide');           
                }
        }
    });
}
</script>