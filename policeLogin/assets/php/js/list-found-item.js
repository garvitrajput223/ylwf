$(document).ready(function(){


    $(".list-new").click(function(){
        $("#ListFoundItems").show();
        $("#allItems").hide();
    });
    $(".view-all").click(function(){
        $("#ListFoundItems").hide();
        $("#allItems").show();
    });



    fetchFoundItems();

    function fetchFoundItems(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchFoundItems' },
			success: function(response){
				$("#showFoundItems").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }	
			}
		});
	}


    $("#saveFoundItemDetails").click(function(e){
        if($("#foundItemForm")[0].checkValidity()){
            e.preventDefault();
            $.ajax({
                url:'assets/php/admin-action.php',
                method: 'post',
                data: $("#foundItemForm").serialize()+'&action=add_item',
                success: function(response){
                    Swal.fire({
						title: 'Item Added Successfully.',
						icon: 'success'
					});
                }
            })
        }
    });

});