<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajar_navtif");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 shadow-xl rounded-2xl">

        <!-- Header -->


        <!-- Content Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Foto -->
            <div class="flex justify-center">
                <img src="upload/<?= $data['gambar']; ?>" 
                     class="w-64 h-64 object-cover rounded-2xl shadow-md border">
            </div>

            <!-- Data Detail -->
            <div class="space-y-4">

                <p>
                    <span class="font-semibold text-gray-600">Nama:</span><br>
                    <span class="text-lg text-gray-800"><?= $data['nama']; ?></span>
                </p>

                <p>
                    <span class="font-semibold text-gray-600">NIM:</span><br>
                    <span class="text-lg text-gray-800"><?= $data['NIM']; ?></span>
                </p>

                <p>
                    <span class="font-semibold text-gray-600">Prodi:</span><br>
                    <span class="text-lg text-gray-800"><?= $data['prodi']; ?></span>
                </p>

                <p>
                    <span class="font-semibold text-gray-600">Alamat:</span><br>
                    <span class="text-lg text-gray-800"><?= $data['alamat']; ?></span>
                </p>
            </div>

        </div>

    </div>

</body>

</html>
