var Court = document.getElementById("court");
var eID = document.getElementsByName("equipment_id[]");
var eQty = document.getElementsByName("equipment_qty[]");
var uid = document.getElementById("user_id");
var Remark = document.getElementById("remark");
var fee = document.getElementById("fee");  
var TNC = document.getElementById("tnc"); 

var Court_name;
var date;
var slot;

$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var valid=false;
var curr_step = 1;


$(".next").click(function(){
    
    switch(curr_step){
        
        case 1:
            valid=validate1();
            break;

        case 2:
            valid=validate2();
            break;

        case 3:
            valid=validate3();
            break;

        default:
            alert("SOMETHING WENT WRONG... REFRESH AND TRY AGAIN");
            break;
    }
    if(valid){
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        curr_step++;

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    }

});

$(".previous").click(function(){

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    curr_step--;

    //remove equipment table
    if(curr_step==1){
        document.getElementById("ep").innerHTML="";
    }
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;

    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });

    $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
});

$("#confirm").click(function(){
    if(!valid){
        // var ct=Court.value;
        // var ud=uid.value;
        // var rm=Remark.value;

        // var data = { 
        //     court:ct ,
        //     uid:ud , 
        //     remark:rm , 
        //     date:date , 
        //     slot:slot,
        //     fee:fee
        // };// passing the values
        // if(!$.post("_asset/process/booking_process.php", data)){
            alert("SERVER_ERROR"); 
        // }
    }
})

});

function validate1(){

    Court_name = $('#court option:selected').attr('court_name');
    if(isCourt())
    {
        if(isSlot())
        {
            document.getElementById("c1").innerText = Court_name;
            document.getElementById("c2").innerText = date;
            document.getElementById("c3").innerText = slot;

            document.getElementById("inputDate").innerHTML = '<input type="hidden" name="bookDate" value="'+date+'"></input>';
            document.getElementById("inputSlot").innerHTML = '<input type="hidden" name="bookSlot" value="'+slot+'"></input>';
            if(eID.length){

                if(isEquip()){
                    return true;
                }
                else{ return false; }
            }
            else{ return true;}
        }
    }
    return false;
}

function isCourt(){

    if(Court.value=='none'){
        setErrorFor('courtErr',"Please choose a court!"); 
        Court.focus();
        return false;
    }
    setSuccessFor('courtErr');
    return true;
}

function isSlot(){
    var slotBoxes = document.querySelectorAll('.empty');
    var slotChecked = Array.prototype.slice.call(slotBoxes).some(x => x.checked);
    if (slotChecked) {
        date = document.querySelector('.empty:checked').getAttribute('date');
        slot = document.querySelector('.empty:checked').value;


        setSuccessFor('slotErr');
        return true;
    }
    setErrorFor('slotErr',"Please choose a slot!"); 
    return false;
}

function isEquip(){

    $equipment='<div class="col-3"><label>Equipment(s): </label></div>';
    $equipment+='<div class="col-9" table-repsonsive">';
    $equipment+='<table class="table table-bordered">';
    $equipment+='<tr>';
    $equipment+='<th>Equipment ID</th>';          
    $equipment+='<th style="width:20px;">Quantity</th>';                
    $equipment+='</tr>';            
                                                        
    for (var i = 0; i < eID.length; i++) {
        var equip_id = eID[i].value;
        var equip_qty = eQty[i].value;
        
        if(equip_id=='none'||equip_qty<=0){
            setErrorFor('equipErr',"Please make sure equipments details are correct!"); 
            return false;
        }
        else if(equip_qty>15){
            setErrorFor('equipErr',"Equipment quantity is too much! (MAX 15 per Item)"); 
            return false;
        }
        else{
            $equipment += '<tr>';
            $equipment += '<td> Equipment#'+equip_id+'</td>';
            $equipment += '<td>'+equip_qty+'</td>';
            $equipment += '</tr>'; 
        }
    }
    $equipment+='</table>';
    $equipment+='</div>';
    $('#ep').append($equipment);
    setSuccessFor('equipErr');
    return true;
}

function validate2(){

    if(isRemark(Remark))
    {
        document.getElementById("u4").innerText = uid.value;
        document.getElementById("u5").innerText = Remark.value;
        return true;
    }

    return false;
}

function isRemark(Remark)
{
	if(Remark.value === '')
    {
        setErrorFor('remarkErr', 'Booking Purpose cannot be blank!');
        Remark.focus();
        return false;
    }
    else
    {
        setSuccessFor('remarkErr');
        return true;
    }
}

function validate3(){

    if($('#tnc').is(':checked')){
        return true;
    }
    else{
        setErrorFor('tncErr', 'You MUST agree to the TnC to Continue');
        TNC.focus();
        return false; 
    }   
}

function setErrorFor( id, message) {
    document.getElementById(id).innerText = message;
    document.getElementById(id).className = 'fail';
}

function setSuccessFor(id) {
    document.getElementById(id).innerText = "Valid";
    document.getElementById(id).className = 'success';
}