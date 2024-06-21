document.querySelectorAll('.toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
        const inputBox = toggle.closest('.input-box');
        const passwordInput = inputBox.querySelector('input[type="password"], input[type="text"]');
        const toggleBtnIcon = toggle.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtnIcon.className = 'bx bxs-lock-open';
        } else {
            passwordInput.type = 'password';
            toggleBtnIcon.className = 'bx bxs-lock';
        }
    });
});
document.querySelectorAll('.input-box input').forEach(input => {
    input.addEventListener('input', () => {
        if (input.value) {
            input.classList.add('valid');
        } else {
            input.classList.remove('valid');
        }
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    const urlParams1 = new URLSearchParams(window.location.search);
    const error1 = urlParams.get('error2');
    const btnpopup = document.querySelector('.btn');
    const wrapper = document.querySelector('.wrapper');
    const iconClose = document.querySelector('.icon-close');

    const forgetpage = document.querySelector('.forget_page');
    const forgotbox = document.querySelector('.forgot-box');
    const registerPage = document.querySelector('.register_page');
    const ragisterbox = document.querySelector('.ragister-box');
    const loginpage = document.querySelector('.loginpage');
    const loginbox = document.querySelector('.login-box');
    const loginpag = document.querySelector('.loginpage1');

    registerPage.addEventListener('click', () => {
    wrapper.classList.add('active');
    ragisterbox.classList.add('active1');
    loginbox.classList.add('active2');
    });


    loginpage.addEventListener('click', () => {
    wrapper.classList.remove('active');
    ragisterbox.classList.remove('active1');
    loginbox.classList.remove('active2');
    });

    forgetpage.addEventListener('click',() =>{
    wrapper.classList.add('active');
    forgotbox.classList.add('active4');
    loginbox.classList.add('active3');
    });
    loginpag.addEventListener('click',() =>{
    wrapper.classList.remove('active');
    forgotbox.classList.remove('active4');
    loginbox.classList.remove('active3');
    });

    if (error) {
    wrapper.classList.add('active');
    ragisterbox.classList.add('active1');
    loginbox.classList.add('active2');
    }
    if (error1) {
        wrapper.classList.add('active');
        forgotbox.classList.add('active4');
        loginbox.classList.add('active3');
        }
});





