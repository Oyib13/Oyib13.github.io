<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajar_navtif");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <div class="max-w-6xl mx-auto py-10 px-5">

        <!-- Header -->
        <h1 class="text-4xl font-bold text-gray-700 mb-3">
            Data Mahasiswa
        </h1>

        <!-- IKON TAMBAH DI BAWAH JUDUL -->
        <a href="tambah.php" 
           class="bg-green-500 hover:bg-green-600 text-white w-9 h-9 flex items-center justify-center rounded-full shadow transition mb-8">
            
            <!-- Icon Plus -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" 
                    d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>

        </a>

        <!-- Table Container -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">

            <table class="w-full">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                         <th class="px-4 py-3 border-b text-center">NO</th>
                        <th class="px-4 py-3 border-b text-center">NIM</th>
                        <th class="px-4 py-3 border-b text-center">Nama</th>
                        <th class="px-4 py-3 border-b text-center">Foto</th>
                        <th class="px-4 py-3 border-b text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-800 text-center">

<?php
$i=1;
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr class="hover:bg-gray-50 transition">
             <td class="px-4 py-3 border-b"><?= $i++; ?></td>
            <td class="px-4 py-3 border-b"><?= $row['NIM']; ?></td>
            <td class="px-4 py-3 border-b"><?= $row['nama']; ?></td>
            

            <td class="px-4 py-3 border-b">
                <div class="flex justify-center">
                    <img src="upload/<?= $row['gambar']; ?>" 
                         class="w-16 h-16 object-cover rounded-xl shadow-sm border">
                </div>
            </td>

            <td class="px-4 py-3 border-b">
                <div class="flex justify-center gap-3">

                    <!-- SHOW ICON -->
                    <a href="detail.php?id=<?= $row['id_mahasiswa']; ?>"
                       class="bg-gray-500 hover:bg-gray-600 text-white w-9 h-9 flex items-center justify-center rounded-full shadow transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                d="M12 5c-7 0-9 7-9 7s2 7 9 7 9-7 9-7-2-7-9-7zm0 10a3 3 0 110-6 3 3 0 010 6z"/>
                        </svg>
                    </a>

                    <!-- EDIT ICON -->
                    <a href="edit.php?id=<?= $row['id_mahasiswa']; ?>"
                       class="bg-blue-500 hover:bg-blue-600 text-white w-9 h-9 flex items-center justify-center rounded-full shadow transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                d="M16.862 3.487a2.13 2.13 0 0 1 3.01 3.01l-9.525 9.526a4.5 4.5 0 0 1-1.897 1.13l-2.677.8.8-2.678a4.5 4.5 0 0 1 1.13-1.897l9.525-9.526z"/>
                        </svg>
                    </a>

                    <!-- DELETE ICON -->
                    <a href="delete.php?id=<?= $row['id_mahasiswa']; ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?')"
                       class="bg-red-500 hover:bg-red-600 text-white w-9 h-9 flex items-center justify-center rounded-full shadow transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M6 7h12m-1 0v12a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V7m3 0V5a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v2"/>
                        </svg>
                    </a>

                </div>
            </td>
        </tr>

<?php } ?>

                </tbody>
            </table>

        </div>

    </div>

</body>
</html>
