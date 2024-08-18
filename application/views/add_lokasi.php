<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Lokasi</title>
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
  <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Tambah Lokasi</h1>

    <!-- Add Lokasi Form -->
    <form action="<?php echo site_url('lokasi/save'); ?>" method="post">
      <div class="mb-4">
        <label for="namaLokasi" class="block text-sm font-medium text-gray-700">Nama Lokasi:</label>
        <input type="text" id="namaLokasi" name="namaLokasi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
      </div>

      <div class="mb-4">
        <label for="kota" class="block text-sm font-medium text-gray-700">Kota: </label>
        <input type="text" id="kota" name="kota" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
      </div>

      <div class="mb-4">
        <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi:</label>
        <input type="text" id="provinsi" name="provinsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
      </div>

      <div class="mb-4">
        <label for="negara" class="block text-sm font-medium text-gray-700">Negara:</label>
        <input type="text" id="negara" name="negara" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
      </div>

      <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        <i class="fas fa-save"></i> Save Location
      </button>
    </form>
  </div>

</body>

</html>