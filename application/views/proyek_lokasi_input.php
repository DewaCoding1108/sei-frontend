<form method="POST" action="<?php echo base_url('proyek/store'); ?>">
    <label>Nama Proyek:</label>
    <input type="text" name="nama_proyek" required><br>

    <label>Nama Lokasi:</label>
    <input type="text" name="nama_lokasi" required><br>

    <button type="submit">Simpan</button>
</form>