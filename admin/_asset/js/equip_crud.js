function removeIt(epd_id){

    if (confirm("Do you want to delete?") == true) {
        $.ajax({
            type: 'post',
            url: '_asset/process/equip_ctrl.php?action=remove',
            data: {
                epd_id:epd_id 
            },
            success: function( data ) {
                console.log( "Success" );
            }
        });
        document.location.reload();
    } 
}

function addNew(){
    $("#detail").load('_asset/process/equip_ctrl.php?action=newForm');
    return;     
}

function editIt(str){
    $("#detail").load('_asset/process/equip_ctrl.php?action=editForm&eqp_id='+str);
    return;     
}

function closeCard(str){
    $("#detail").html('');
    return;     
}