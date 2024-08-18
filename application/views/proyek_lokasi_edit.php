<form method="POST" action="<?php echo base_url('proyek/update/'.$proyek['id'].'/'.$lokasi['id']); ?>">
    <label>Nama Proyek:</label>
    <input type="text" name="nama_proyek" value="<?php echo $proyek['nama_proyek']; ?>" required><br>

    <label>Nama Lokasi:</label>
    <input type="text" name="nama_lokasi" value="<?php echo $lokasi['nama_lokasi']; ?>" required><br>

    <button type="submit">Update</button>
</form>