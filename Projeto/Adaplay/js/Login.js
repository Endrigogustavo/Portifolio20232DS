const container = document.getElementById('containerrr');
const registerBtn = document.getElementById('registerr');
const loginBtn = document.getElementById('loginn');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});