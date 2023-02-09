<?php

include 'fungsi.php';

$id = $_GET['id'];
$kueri = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = '$id'");

if (isset($_POST['ubah'])) {
    if (edit($_POST) > 0) {
        echo "<script>
            alert('Data Siswa berhasil diubah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Siswa gagal diubah!');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title><?= $judul; ?></title>
</head>

<body>

    <div class="card">
        <div class="card-header">
            Edit Data Siswa
        </div>
        <form method="post">
            <div class="card-body">
                <?php foreach ($kueri as $data) : ?>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $data['nis']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" placeholder="Masukkan Nama Siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">KELAS</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kelas" id="kelas1" value="X" <?php if ($data['kelas'] == 'X') { ?> checked <?php } ?>>
                            <label class="form-check-label" for="kelas1">
                                X
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kelas" id="kelas2" value="XI" <?php if ($data['kelas'] == 'XI') { ?> checked <?php } ?>>
                            <label class="form-check-label" for="kelas2">
                                XI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kelas" id="kelas3" value="XII" <?php if ($data['kelas'] == 'XII') { ?> checked <?php } ?>>
                            <label class="form-check-label" for="kelas3">
                                XII
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">JURUSAN</label>
                        <select class="form-control" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan Siswa</option>
                            <option value="TMI" <?php if ($data['jurusan'] == 'TMI') { ?> selected <?php } ?>>Teknik Mekanik Industri (TMI)</option>
                            <option value="TOI" <?php if ($data['jurusan'] == 'TOI') { ?> selected <?php } ?>>Teknik Otomasi Industri (TOI)</option>
                            <option value="AK" <?php if ($data['jurusan'] == 'AK') { ?> selected <?php } ?>>Akuntansi (AK)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">ALAMAT</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Kabupaten" rows="2" required><?= $data['alamat']; ?></textarea>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="card-footer text-muted">
                <a class="btn btn-secondary" href="index.php">Kembali</a>
                <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>