const loginPopup = document.querySelector(".login-popup");
const close = document.querySelector(".close");
const button = document.querySelector("#btn");

button.addEventListener("click",function(event){
	event.preventDefault();
	showPopup();
})
function showPopup(){
	// document.getElementById("popup-login").style.visibility = 'visible';
	// document.getElementById("popup-login").style.opacity = '1';
	loginPopup.classList.add("show");
}
close.addEventListener("click",function(){
	loginPopup.classList.remove("show");
})

// SIGNUP FORM
const signupPopup = document.querySelector(".signup-popup");
const closesignup = document.querySelector(".closesignup");
const buttonSignup = document.querySelector(".btn_create");

buttonSignup.addEventListener("click",function(event){
	event.preventDefault();
	showPopupSignup();
})
function showPopupSignup(){
	signupPopup.classList.add("showsignup");
	loginPopup.classList.remove("show");
}
closesignup.addEventListener("click",function(){
	signupPopup.classList.remove("showsignup");
})
//FORGOT PASSWORD FORM
const passwordPopup = document.querySelector(".password-popup");
const closepassword = document.querySelector(".close-password");
const buttonpassword = document.querySelector("#btnpass");

buttonpassword.addEventListener("click",function(event){
	event.preventDefault();
	showPopuppassword();
})
function showPopuppassword(){
	loginPopup.classList.remove("show");
	passwordPopup.classList.add("show-password");
}
closepassword.addEventListener("click",function(){
	passwordPopup.classList.remove("show-password");
})
$(document).ready(function() {
    $(window).scroll(function() {
        let scrollTop = $(window).scrollTop();
        if (scrollTop > 785) {
            document.getElementById('containerabout').classList.add('solid-nav');
        } else {
            $('#containerabout').removeClass('solid-nav');
        }
    });
});