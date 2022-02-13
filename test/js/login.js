// function openLoginForm(){
//     document.body.classList.add("showLoginForm");
// }
// function closeLoginForm(){
//     document.body.classList.remove("showLoginForm");
// }

// function openRegisterForm(){
//     document.body.classList.add("showRegisterForm");
// }
// function closeRegisterForm(){
//     document.body.classList.remove("showRegisterForm");
// }

document.querySelector("#show-login").addEventListener("click", function(){
    document.querySelector(".popup").classList.add("active");
});

document.querySelector("#show-register").addEventListener("click", function(){
    document.querySelector(".popup-reg").classList.add("active");
});

document.querySelector(".popup .close-btn").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
});

document.querySelector(".popup-reg .close-btn").addEventListener("click", function(){
    document.querySelector(".popup-reg").classList.remove("active");
});

