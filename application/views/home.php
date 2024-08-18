<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampilan Awal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="font-poppins">
  <header class="w-full bg-white flex justify-between items-center p-8 h-24 border-b-2 border-green-100">
    <div>
      <a href="<?= base_url('/') ?>"><img src="<?= base_url('assets/images/logo.png') ?>" alt="logo" class="h-16" /></a>
    </div>
    <div>
      <h1 class="text-green-600 font-bold">Project Management System</h1>
    </div>
  </header>

  <!-- Hero -->
  <!-- <div class="w-full h-[42rem] bg-[url('assets/images/renewable_energy.jpg')] bg-no-repeat bg-cover flex flex-col items-center justify-center">
    <p class="text-center mt-20 text-xl text-white bg-green-600 p-5 rounded-xl">" A Transition To Clean Energy Is About<span class="block">Making An Investment In Our Future "</span></p>
  </div> -->

  <div id="project" class="mt-4 px-10">
    <div class="flex justify-between items-center">
      <h2 class="text-black-700 text-2xl">Project List</h2>
      <a href="<?php echo site_url('add_proyek'); ?>">
        <button class="btn-add" type="submit">
          <i class="fas fa-plus"></i> Add Proyek
        </button>
      </a>
    </div>
    <ul class="flex gap-5 items-center overflow-x-auto">
      <?php if (!empty($proyek)): ?>
        <?php foreach ($proyek as $item): ?>
          <li>
            <div class="w-[280px] h-[500px] border border-gray-300 rounded-lg p-4 my-4 shadow-lg">
              <img src="<?= base_url('assets/images/hero.png') ?>" alt="Uploaded Image" class="w-full h-auto rounded-xl">
              <p class="text-lg pt-2 pb-1"><?php echo htmlspecialchars($item['namaProyek']); ?></p>
              <div class="flex items-center gap-5">
                <i class="fas fa-calendar-alt text-green-600"></i>
                <p class="text-base"><?php echo htmlspecialchars(date('j F Y', strtotime($item['tglMulai']))); ?></p>
              </div>
              <div class="flex items-center gap-5">
                <i class="fas fa-calendar-alt text-red-600"></i>
                <p class="text-base"><?php echo htmlspecialchars(date('j F Y', strtotime($item['tglSelesai']))); ?></p>
              </div>
              <div class="flex items-center gap-5">
                <i class="fas fa-briefcase"></i>
                <p class="text-base"><?php echo htmlspecialchars($item['client']); ?></p>
              </div>
              <div class="flex items-center gap-5">
                <i class="fas fa-user"></i>
                <p class="text-base"><?php echo htmlspecialchars($item['pimpinanProyek']); ?></p>
              </div>
              <div class="flex items-center gap-5">
                <i class="fas fa-file-alt"></i>
                <p><?php echo htmlspecialchars($item['keterangan']); ?></p>
              </div>
              <?php if (!empty($item['lokasi'])): ?>
                <div class="flex items-center gap-5">
                  <i class="fas fa-map-marker-alt"></i>
                  <p class="text-base"><?php echo htmlspecialchars($item['lokasi']['namaLokasi']); ?></p>
                </div>
              <?php endif; ?>
              <div class="flex items-center justify-center gap-5 mt-5">
                <a href="<?= site_url('proyek/edit/' . $item['id']); ?>" class="border-2 border-slate-400 rounded-xl px-8 py-1">
                  <i class="fas fa-edit"></i>
                </a>
                <!-- <button class="btn-edit border-2 border-slate-400 rounded-xl px-8 py-1 " title="Edit">
                  <i class="fas fa-edit"></i>
                </button> -->
                <button class="btn-delete border-2 border-slate-400 rounded-xl px-8 py-1 " title="Delete">
                  <i class="fas fa-trash text-red-600"></i>
                </button>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <h1>Tidak ada data proyek</h1>
      <?php endif; ?>
    </ul>
  </div>
  <div id="location" class="mt-6 px-10">
    <div class="flex justify-between items-center">
      <h2 class="text-black-700 text-2xl">Location List</h2>
      <a href="<?php echo site_url('add_lokasi'); ?>">
        <button class="btn-add" type="submit">
          <i class="fas fa-plus"></i> Add Lokasi
        </button>
      </a>
    </div>
    <ul class="flex gap-5 items-center overflow-x-auto">
      <?php if (!empty($lokasi)): ?>
        <?php foreach ($lokasi as $item): ?>
          <li>
            <div class="w-[280px] border border-gray-300 rounded-lg p-4 my-4 shadow-lg">
              <img src="<?= base_url('assets/images/hero.png') ?>" alt="Uploaded Image" class="w-full h-auto rounded-xl">
              <p class="text-lg pt-2 pb-1"><?php echo htmlspecialchars($item['namaLokasi']); ?></p>
              <p class="text-base"><strong>Kota:</strong> <?php echo htmlspecialchars($item['kota']); ?></p>
              <p class="text-base"><strong>Provinsi:</strong> <?php echo htmlspecialchars($item['provinsi']); ?></p>
              <p class="text-base"><strong>Negara:</strong> <?php echo htmlspecialchars($item['negara']); ?></p>
              <div class="flex items-center justify-center gap-5 mt-5">
                <a href="<?= site_url('lokasi/edit/' . $item['id']); ?>" class="border-2 border-slate-400 rounded-xl px-8 py-1">
                  <i class="fas fa-edit"></i>
                </a>
                <!-- <button class="btn-edit border-2 border-slate-400 rounded-xl px-8 py-1 " title="Edit">
                  <i class="fas fa-edit"></i>
                </button> -->
                <button class="btn-delete border-2 border-slate-400 rounded-xl px-8 py-1 " title="Delete">
                  <i class="fas fa-trash text-red-600"></i>
                </button>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <li>Tidak ada data lokasi</li>
      <?php endif; ?>
    </ul>
  </div>
</body>

</html>