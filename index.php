<?php

include 'fungsi.php';

$kueri = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY kelas ASC");
$maxID = mysqli_query($koneksi, "SELECT MAX(id) as maxID FROM siswa");
$nilai = mysqli_fetch_array($maxID);
$kode = $nilai['maxID'];
$kode++;
$nis = "MU" . date('Y') . "." . sprintf('%03s', $kode);

if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data Siswa berhasil disimpan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Siswa gagal disimpan!');
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
    <title><?= $judul ?></title>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><?= $subjudul; ?></a>
    </nav>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-top: 2%; margin-left: 2%;">
        Tambah
    </button>

    <table class="table table-hover mx-auto" style="width: 90%; margin-top: 2%; text-align: center;">
        <thead>
            <tr>
                <th scope="col">NIS</th>
                <th scope="col">NAMA</th>
                <th scope="col">KELAS</th>
                <th scope="col">JURUSAN</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kueri as $data) : ?>
                <tr>
                    <th scope="row"><?= $data['nis']; ?></th>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['kelas']; ?></td>
                    <td><?= $data['jurusan']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        |
                        <a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nis" name="nis" value="<?= $nis; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Siswa" required>
                            </div>
                        </div>
                        <fieldset class="form-group row">
                            <legend class="col-form-label col-sm-2 float-sm-left pt-0">KELAS</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kelas" id="kelas1" value="X" required>
                                    <label class="form-check-label" for="kelas1">
                                        X
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kelas" id="kelas2" value="XI" required>
                                    <label class="form-check-label" for="kelas2">
                                        XI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kelas" id="kelas3" value="XII" required>
                                    <label class="form-check-label" for="kelas3">
                                        XII
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-2 col-form-label">JURUSAN</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jurusan" name="jurusan" required>
                                    <option value="">Pilih Jurusan Siswa</option>
                                    <option value="TMI">Teknik Mekanik Industri (TMI)</option>
                                    <option value="TOI">Teknik Otomasi Industri (TOI)</option>
                                    <option value="AK">Akuntansi (AK)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Kabupaten" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>