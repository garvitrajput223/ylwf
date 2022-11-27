$(document).ready(function(){

$("#uploadDocuments").submit(function(e){
    e.preventDefault();
    $("#edit-profile-spinner").show();
    $.ajax({
        url: 'assets/php/process.php',
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        data: new FormData(this),
        success: function(response){
            $("#edit-profile-spinner").hide();
            location.reload();
        }
    });
});

});