// LOGIN FORM
const loginPopup = document.querySelector(".login-popup");
const close = document.querySelector(".close");
const button = document.querySelector("#btn");

button.addEventListener("click",function(event){
    event.preventDefault();
    showPopup();
    console.log(event);
})
function showPopup(){
    // document.getElementById("popup-login").style.visibility = 'visible';
    // document.getElementById("popup-login").style.opacity = '1';
    loginPopup.classList.add("show");
}
close.addEventListener("click",function(){
    loginPopup.classList.remove("show");
}) 