<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajar_navtif");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .container {
            max-width: 600px;
            margin-top: 40px;
        }
        .add-icon {
            font-size: 30px; 
            cursor: pointer;
            color: #0d6efd;
        }
        .add-icon:hover {
            color: #084298;
        }
    </style>
</head>

<body class="bg-light">

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Edit Data Mahasiswa</h2>

       
    </div>

   

    <div class="card p-4 shadow-sm">

        <form action="" method="POST" enctype="multipart/form-data">
            
            <label class="form-label">NIM :</label>
            <input type="text" name="NIM" class="form-control mb-2" value="<?= $data['NIM']; ?>">

            <label class="form-label">Nama :</label>
            <input type="text" name="nama" class="form-control mb-2" value="<?= $data['nama']; ?>">

            <label class="form-label">Prodi :</label>
            <input type="text" name="prodi" class="form-control mb-2" value="<?= $data['prodi']; ?>">

            <label class="form-label">Alamat :</label>
            <input type="text" name="alamat" class="form-control mb-2" value="<?= $data['alamat']; ?>">

            <label class="form-label mt-2">Foto Saat Ini:</label><br>
            <img src="upload/<?= $data['gambar']; ?>" width="120" class="rounded mb-3"><br>

            <label class="form-label">Ganti Foto :</label>
            <input type="file" name="gambar" class="form-control mb-3">

            <input type="hidden" name="gambar_lama" value="<?= $data['gambar']; ?>">

            <button type="submit" name="update" class="btn btn-primary w-100">
                Update Data
            </button>
        </form>
    </div>
</div>


<?php
if (isset($_POST['update'])) {

    $NIM    = $_POST['NIM'];
    $nama   = $_POST['nama'];
    $prodi  = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    $gambar_lama = $_POST['gambar_lama'];
    $gambar_baru = $_FILES['gambar']['name'];
    $tmp_file    = $_FILES['gambar']['tmp_name'];

    // Jika upload gambar baru
    if ($gambar_baru != "") {

        $ext = pathinfo($gambar_baru, PATHINFO_EXTENSION);
        $nama_file_baru = "foto_" . time() . "." . $ext;

        move_uploaded_file($tmp_file, "upload/" . $nama_file_baru);

        $gambar_final = $nama_file_baru;

        // Hapus foto lama
        if (file_exists("upload/" . $gambar_lama)) {
            unlink("upload/" . $gambar_lama);
        }

    } else {
        $gambar_final = $gambar_lama;
    }

    mysqli_query($koneksi, "UPDATE mahasiswa SET
            NIM='$NIM',
            nama='$nama',
            prodi='$prodi',
            alamat='$alamat',
            gambar='$gambar_final'
            WHERE id_mahasiswa='$id'");
?>

<script>
Swal.fire({
    title: "Berhasil!",
    text: "Data mahasiswa berhasil diperbarui",
    icon: "success",
    timer: 2000,
    showConfirmButton: false
}).then(() => {
    window.location = "index.php";
});
</script>

<?php } ?>

</body>
</html>
