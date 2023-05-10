<div class="container mt-3">
    <div class="col md-3">
    <a class="btn btn-outline-primary" href="<?= base_url(); ?>produk" role="button">Tambah Produk</a>

    <br><br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Masuk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Nama Penjual</th>
                    <th scope="col">Alamat Penjual</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($join as $row) {?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['no_masuk']; ?></td>
                    <td><?= $row['nama_produk']; ?></td>
                    <td>Rp. <?= number_format($row['harga'],2,',','.'); ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td><?= $row['nama_penjual']; ?></td>
                    <td><?= $row['alamat_penjual'] ?></td>
                    <td><?= $row['tgl_masuk']; ?></td>
                </tr>
            <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>

