const pesan = document.getElementById('alert');
const close = document.querySelector('.close');
const judul = document.querySelector('#alert h3');
const paragraf = document.querySelector('#alert p');
const image = document.querySelector('#alert img');
const opacitySplit = document.querySelector('#split')

setTimeout(() => {
    window.location.href = 'todolist.php';
}, 6000)

judul.innerHTML = "Berhasil Menambahkan Todo List !";
paragraf.innerHTML = "Cek apakau sudah ditambahkan atau belum";
image.src = '../../assets/checklist.png';
pesan.classList.add('show');
opacitySplit.classList.add('opacity');
close.addEventListener('click', () => {
    pesan.classList.remove('show');
    opacitySplit.classList.remove('opacity');
})