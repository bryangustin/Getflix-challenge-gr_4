// LOGIN FORM
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
// navbar transparent to opaque
$(document).ready(function() {
    $(window).scroll(function() {
        let scrollTop = $(window).scrollTop();
        if (scrollTop > 755) {
           document.getElementById('container').classList.add('solid-nav');
        } else {
            $('#container').removeClass('solid-nav');
        }
    });
});
