function removeIt(uid){  
    if (confirm("Do you want to delete user?") == true) {
    
    $.ajax({
        type: 'post',
        url: '_asset/process/user_ctrl.php?action=remove',
        data: {
            user_id:uid 
        },
        success: function( data ) {
            console.log( "Success" );
        }
    });
    document.location.reload();
    }   
}

function addNew(){
    $("#detail").load('_asset/process/user_ctrl.php?action=newForm');
    return;     
}

function viewMore(str){
    $("#detail").load('_asset/process/user_ctrl.php?action=read&user_id='+str);
    return;     
}

function editIt(str){
    $("#detail").load('_asset/process/user_ctrl.php?action=editForm&user_id='+str);
    return;     
}

function banIt(){
    $("#detail").load('_asset/process/user_ctrl.php?action=banForm');
    return;     
}

function viewBan(str){
    $("#detail").load('_asset/process/user_ctrl.php?action=readBan&user_id='+str);
    return;     
}

function editBan(str){
    $("#detail").load('_asset/process/user_ctrl.php?action=editBanForm&user_id='+str);
    return;     
}

function removeBan(str){

    if (confirm("Do you want to unban?") == true) {
        $.ajax({
            type: 'post',
            url: '_asset/process/user_ctrl.php?action=removeBan',
            data: {
                ban_id:str 
            },
            success: function( data ) {
                console.log( "Success" );
            }
        });
        document.location.reload();
    }     
}

function closeCard(str){
    $("#detail").html('');
    return;     
}