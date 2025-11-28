<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajar_navtif");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50">

<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-lg">

   
    <h1 class="text-3xl font-bold text-gray-700 mb-6">Tambah Data Mahasiswa</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">

        <div>
            <label class="font-semibold">Nama:</label>
            <input type="text" name="nama" required
                   class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
        </div>

        <div>
            <label class="font-semibold">NIM:</label>
            <input type="text" name="NIM" required
                   class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
        </div>

        <div>
            <label class="font-semibold">Prodi:</label>
            <input type="text" name="prodi" required
                   class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
        </div>

        <div>
            <label class="font-semibold">Alamat:</label>
            <input type="text" name="alamat" required
                   class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
        </div>

        <div>
            <label class="font-semibold">Foto:</label>
            <input type="file" name="gambar" required
                   class="w-full mt-1 border rounded-lg bg-gray-100 px-3 py-2">
        </div>

        <button type="submit" name="submit"
                class="w-full bg-green-500 text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition">
            Simpan Data
        </button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $nama   = $_POST['nama'];
        $NIM    = $_POST['NIM'];
        $prodi  = $_POST['prodi'];
        $alamat = $_POST['alamat'];

        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        if (!is_dir('upload')) {
            mkdir('upload', 0777, true);
        }

        $namaBaru = time() . "_" . $gambar;
        $target   = "upload/" . $namaBaru;

        if (move_uploaded_file($tmp, $target)) {

            $query = "INSERT INTO mahasiswa (NIM, nama, prodi, alamat, gambar)
                      VALUES ('$NIM', '$nama', '$prodi', '$alamat', '$namaBaru')";

            if (mysqli_query($koneksi, $query)) {

                // SWEETALERT + REDIRECT
                echo "
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data berhasil ditambahkan!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                </script>
                ";
                
            } else {
                echo "
                <script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal menyimpan ke database!',
                        icon: 'error'
                    });
                </script>
                ";
            }

        } else {
            echo "
            <script>
                Swal.fire({
                    title: 'Upload Gagal!',
                    text: 'Gambar tidak dapat diupload.',
                    icon: 'error'
                });
            </script>
            ";
        }
    }
    ?>

</div>

</body>
</html>
