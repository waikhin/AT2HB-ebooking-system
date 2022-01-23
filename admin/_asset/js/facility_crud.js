function removeIt(cid,date,uid){  
    
    $.ajax({
        type: 'post',
        url: '_asset/process/facility_ctrl.php?action=remove',
        data: {
            cid:cid,
            date:date,
            uid:uid 
        },
        success: function( data ) {
            console.log( "Success" );
        }
    });
    document.location.reload()
}

function addNew(){
    $("#detail").load('_asset/process/facility_ctrl.php?action=newForm');
    return;     
}

function lockIt(){
    $("#detail").load('_asset/process/facility_ctrl.php?action=lockForm');
    return;     
}

function viewMore(str){
    $("#detail").load('_asset/process/facility_ctrl.php?action=read&f_id='+str);
    return;     
}

function editIt(str){
    $("#detail").load('_asset/process/facility_ctrl.php?action=editForm&f_id='+str);
    return; 
}    

function closeCard(str){
    $("#detail").html('');
    return;     
}