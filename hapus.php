<?php

include 'fungsi.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "<script>
        alert('Data Siswa berhasil dihapus!');
        document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Data Siswa gagal dihapus!');
    </script>";
}
