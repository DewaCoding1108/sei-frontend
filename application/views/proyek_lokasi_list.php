<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Surya Energi Indotama - List Proyek dan Lokasi</title>
</head>
<body>
    <?php $this->load->view('header'); ?>
    
    <main>
        <section>
            <h1>List Proyek</h1>
            <ul>
                <?php if (!empty($proyek)): ?>
                    <?php foreach ($proyek as $item): ?>
                        <li><strong>Proyek:</strong> <?php echo htmlspecialchars($item['nama_proyek']); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Tidak ada data proyek</li>
                <?php endif; ?>
            </ul>
        </section>

        <section>
            <h1>List Lokasi</h1>
            <ul>
                <?php if (!empty($lokasi)): ?>
                    <?php foreach ($lokasi as $item): ?>
                        <li><strong>Lokasi:</strong> <?php echo htmlspecialchars($item['nama_lokasi']); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Tidak ada data lokasi</li>
                <?php endif; ?>
            </ul>
        </section>
    </main>

    <footer>
        <a href="<?php echo base_url('proyek/create'); ?>">Tambah Proyek dan Lokasi Baru</a>
    </footer>
</body>
</html>