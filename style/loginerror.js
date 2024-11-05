const pesan = document.getElementById('alert');
const close = document.querySelector('.close');
const judul = document.querySelector('#alert h3');
const paragraf = document.querySelector('#alert p');
const image = document.querySelector('#alert img');
const login = document.getElementById('login')

setTimeout(() => {
    window.location.href = '../login/login.php';
}, 6000)

judul.innerHTML = "Login Gagal !";
paragraf.innerHTML = "Username atau Password ada yang salah";
image.src = '../assets/remove.png';
pesan.classList.add('show');
login.classList.add('message')
close.addEventListener('click', () => {
    pesan.classList.remove('show');
    login.classList.remove('message')
})
