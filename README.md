# ReminderMe

**ReminderMe** adalah sebuah website yang dirancang untuk membantu mahasiswa mengelola tugas dan jadwal kuliah mereka dengan lebih efektif. Aplikasi ini menyediakan berbagai fitur untuk meningkatkan produktivitas dan kinerja akademik mahasiswa.

## Fitur-fitur Utama

1. **Registrasi dan Profil Pengguna**
   - Pengguna dapat membuat dan mengedit profil mereka, termasuk informasi pribadi dan preferensi pengaturan.

2. **Daftar Tugas dan Pengingat**
   - Membuat dan mengatur daftar tugas dengan deadline dan pengingat yang spesifik.

3. **Jadwal Kuliah Terorganisir**
   - Menyediakan tampilan jadwal kuliah yang rapi dan terorganisir.

4. **Pencapaian dan Kemajuan**
   - Menandai tugas yang telah selesai dan melacak kemajuan pengguna.

5. **Notifikasi Pengingat**
   - Mengingatkan pengguna tentang tugas yang harus dikerjakan melalui notifikasi.

## Breakdown Website ReminderMe

Berikut adalah rincian komponen-komponen yang ada dalam website ReminderMe:

1. **Halaman Utama (Index)**
   - Menampilkan tampilan awal website ReminderMe.
   - Menyediakan opsi untuk login atau register.

2. **Halaman Register**
   - Menampilkan formulir pendaftaran untuk membuat akun baru.
   - Memvalidasi input pengguna dan menyimpan informasi akun baru ke database.
   - Setelah pendaftaran berhasil, pengguna dapat diarahkan ke halaman login.

3. **Halaman Login**
   - Menampilkan formulir login untuk pengguna yang sudah memiliki akun.
   - Memvalidasi kredensial login dan memeriksa kecocokan dengan data di database.
   - Jika login berhasil, pengguna akan diarahkan ke halaman profil.

4. **Halaman Profil (Profile)**
   - Menampilkan informasi pengguna seperti username, email, dan nama lengkap.
   - Memberikan opsi untuk mengedit profil pengguna.
   - Menampilkan kalender yang menampilkan jadwal mata kuliah dan tugas yang belum selesai.
   - Menyediakan tautan ke halaman jadwal mata kuliah dan daftar tugas.

5. **Halaman Jadwal Mata Kuliah (Schedule)**
   - Menampilkan jadwal mata kuliah pengguna.
   - Menyediakan opsi untuk menambah, mengedit, atau menghapus jadwal mata kuliah.
   - Memvalidasi input pengguna dan memperbarui data di database.

6. **Halaman Daftar Tugas (To-Do List)**
   - Menampilkan daftar tugas pengguna yang belum selesai.
   - Menyediakan opsi untuk menambah, mengedit, atau menghapus tugas.
   - Memvalidasi input pengguna dan memperbarui data di database.

7. **Fitur Logout**
   - Menyediakan opsi untuk keluar dari akun pengguna.
   - Menghapus sesi pengguna dan mengarahkan pengguna kembali ke halaman login.

8. **Database**
   - Menyimpan data pengguna (Users), jadwal mata kuliah (JadwalKuliah), dan daftar tugas (ToDoList).
   - Menggunakan relasi antara tabel-tabel untuk menghubungkan data pengguna dengan jadwal mata kuliah dan daftar tugas yang sesuai.

## Teknologi yang Digunakan
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: phpMyAdmin (MySQL)

---

**ReminderMe** membantu mahasiswa menjadi lebih terorganisir, produktif, dan efektif dalam mengelola tugas dan jadwal kuliah mereka. Aplikasi ini dirancang untuk memenuhi kebutuhan mahasiswa modern dengan berbagai fitur yang intuitif dan mudah digunakan.

