const signUp = document.getElementById('sign_up'),
    signIn = document.getElementById('sign_in'),
    loginIn = document.getElementById('login_in'),
    loginUp = document.getElementById('login_up');

signUp.addEventListener('click', () => {
    loginIn.classList.remove('block');
    loginUp.classList.remove('none');
    loginIn.classList.add('none');
    loginUp.classList.add('block');
});

signIn.addEventListener('click', () => {
    loginIn.classList.remove('none');
    loginUp.classList.remove('block');
    loginIn.classList.add('block');
    loginUp.classList.add('none');
});
