function approveIt(rid){    
    $.ajax({
        type: 'post',
        url: '_asset/process/booking_ctrl.php?action=update',
        data: {
            rid:rid ,
            rst:'Approved' 
        },
        success: function( data ) {
            console.log( "Success" );
        }
    });
    document.location.reload()
}

function rejectIt(rid){    
    $.ajax({
        type: 'post',
        url: '_asset/process/booking_ctrl.php?action=update',
        data: {
            rid:rid ,
            rst:'Rejected' 
        },
        success: function( data ) {
            console.log( "Success" );
        }
    });
    document.location.reload()
}

function viewMore(str){
    $("#detail").load('_asset/process/booking_ctrl.php?action=read&rsvp_id='+str);
    return;     
}

function editIt(str){
    $("#detail").load('_asset/process/booking_ctrl.php?action=editForm&rsvp_id='+str);
    return;     
}

function closeCard(str){
    $("#detail").html('');
    return;     
}