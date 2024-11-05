const pesan = document.getElementById('alert');
const close = document.querySelector('.close');
const paragraf = document.querySelector('#alert p');
const judul = document.querySelector('#alert h3');
const login = document.getElementById('login');

setTimeout(() => {
    window.location.href = '../login/login.php';
}, 6000)

judul.innerHTML = "Registrasi Berhasil !"
paragraf.innerHTML = "Silahkan Login"
pesan.classList.add('show');
login.classList.add('message')
close.addEventListener('click', () => {
    pesan.classList.remove('show');
    login.classList.remove('message');
})
