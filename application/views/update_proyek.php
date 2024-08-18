<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Proyek</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="font-poppins">

  <!-- Header -->
  <header class="w-full bg-white flex justify-between items-center p-8 h-24 border-b-2 border-green-100 mb-8">
    <div>
      <a href="<?= base_url('/') ?>">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="logo" class="h-16" />
      </a>
    </div>
    <div>
      <h1 class="text-green-600 font-bold">Project Management System</h1>
    </div>
  </header>

  <!-- Main Container -->
  <div class="max-w-2xl mx-auto bg-white px-6 pt-2 pb-4 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Tambah Proyek</h1>

    <!-- Add Proyek Form -->
    <form action="<?php echo site_url('proyek/update/' . $proyek['id']); ?>" method="post">
      <div class="mb-2">
        <label for="namaProyek" class="block text-sm font-medium text-gray-700">Nama Proyek:</label>
        <input type="text" id="namaProyek" name="namaProyek" value="<?= set_value('namaProyek', $proyek['namaProyek']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
      </div>

      <div class="mb-2">
        <label for="client" class="block text-sm font-medium text-gray-700">Client:</label>
        <input type="text" id="client" name="client" value="<?= set_value('client', $proyek['client']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
      </div>

      <div class="flex items-center justify-between mb-4">
        <div>
          <label for="tglMulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai:</label>
          <input type="date" id="tglMulai" name="tglMulai" value="<?= set_value('tglMulai', (new DateTime($proyek['tglMulai']))->format('Y-m-d')); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
        </div>
        <div>
          <label for="tglSelesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai:</label>
          <input type="date" id="tglSelesai" name="tglSelesai" value="<?= set_value('tglSelesai', (new DateTime($proyek['tglSelesai']))->format('Y-m-d')); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
        </div>
      </div>



      <div class="mb-2">
        <label for="pimpinanProyek" class="block text-sm font-medium text-gray-700">Pimpinan Proyek:</label>
        <input type="text" id="pimpinanProyek" name="pimpinanProyek" value="<?= set_value('pimpinanProyek', $proyek['pimpinanProyek']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
      </div>

      <div class="mb-2">
        <label for="keterangan" class="block text-sm font-medium text-gray-700">Deskripsi:</label>
        <textarea id="keterangan" name="keterangan" rows="1" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required> <?= set_value('keterangan', $proyek['keterangan']); ?></textarea>
      </div>

      <div class="mb-2">
        <label for="lokasi_id" class="block text-sm font-medium text-gray-700">Lokasi:</label>
        <select id="lokasi_id" name="lokasi_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
          <option value="<?= set_value('id', $proyek['lokasi']['id']); ?>"><?php echo htmlspecialchars($proyek['lokasi']['namaLokasi']); ?></option>
          <?php foreach ($lokasi as $item): ?>
            <option value="<?= $item['id'] ?>"><?= htmlspecialchars($item['namaLokasi']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        <i class="fas fa-save"></i> Update Proyek
      </button>
    </form>
  </div>

</body>

</html>