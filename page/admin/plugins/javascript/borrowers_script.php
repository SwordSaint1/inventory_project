<script type="text/javascript">

const search_borrower =()=>{
    $('#spinner').css('display','block');
    var id_number = document.getElementById('id_number_search').value;
	var department = document.getElementById('department_search').value;
	$.ajax({
        url:'../../process/processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'borrowers_list',
            id_number:id_number,
			department:department
        },success:function(response){
            $('#list_of_borrowers').html(response);
            $('#spinner').fadeOut();
        }
    });
}
</script>