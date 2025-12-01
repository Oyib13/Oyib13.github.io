<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil data mahasiswa berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
$data  = mysqli_fetch_assoc($query);

$gambar = $data['gambar'];

// Hapus file gambar jika ada
if (!empty($gambar) && file_exists("upload/" . $gambar)) {
    unlink("upload/" . $gambar);
}

// Hapus data di database
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa='$id'");
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
Swal.fire({
    icon: 'success',
    title: 'Data Berhasil Dihapus!',
    text: 'Data mahasiswa sudah dihapus dari database.',
    showConfirmButton: false,
    timer: 1500
}).then(() => {
    window.location.href = "index.php";
});
</script>

</body>
</html>
