var ndp1 = document.querySelector('.ndp1');
var ndp2 = document.querySelector('.ndp2');
ndp2.onkeyup = function(){
    message_error = document.querySelector('.message_error');
    if(ndp1.value != ndp2.value){
        message_error.innerText = "Passwords aren't in accordance with each others";

    }else{
        message_error.innerText = ""
    }
}