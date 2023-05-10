<div class="container mt-3">
    <div class="col md-3">
    <a class="btn btn-outline-primary" href="<?= base_url(); ?>produk" role="button">Tambah Pengiriman</a>

    <br><br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Keluar</th>
                    <th scope="col">Nama Reseller</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jml Produk</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($join as $row) {?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['no_keluar']; ?></td>
                    <td><?= $row['nama_pembeli']; ?></td>
                    <td><?= $row['nama_produk']; ?></td>
                    <td>Rp. <?= number_format($row['harga'],2,',','.'); ?></td>
                    <td><?= $row['jumlah_produk']; ?></td>
                    <td>Rp. <?= number_format($row['total_harga'],2,',','.'); ?></td>
                    <td><?= $row['alamat_pembeli'] ?></td>
                    <td><?= $row['tgl_keluar'] ?></td>
                </tr>
            <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>

