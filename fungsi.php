<?php

$koneksi = mysqli_connect("localhost", "root", "", "test");
$judul = "Pemrograman Web 1";
$subjudul = "CRUD PHP + Bootstrap + MySQL";

function tambah($data)
{
    global $koneksi;

    $nis = $data['nis'];
    $nama = $data['nama'];
    $kelas = $data['kelas'];
    $jurusan = $data['jurusan'];
    $alamat = $data['alamat'];

    mysqli_query(
        $koneksi,
        "INSERT INTO siswa(nis, nama, kelas, jurusan, alamat) VALUES ('$nis', '$nama', '$kelas', '$jurusan', '$alamat')"
    );

    return mysqli_affected_rows($koneksi);
}

function edit($data)
{
    global $koneksi;

    $nis = $data['nis'];
    $nama = $data['nama'];
    $kelas = $data['kelas'];
    $jurusan = $data['jurusan'];
    $alamat = $data['alamat'];

    mysqli_query(
        $koneksi,
        "UPDATE siswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', alamat = '$alamat' WHERE nis = '$nis'"
    );

    return mysqli_affected_rows($koneksi);
}

function hapus($id)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "DELETE FROM siswa WHERE id = '$id'"
    );

    return mysqli_affected_rows($koneksi);
}
