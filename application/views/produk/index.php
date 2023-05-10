<div class="container mt-3">
<div class="col-md-3">
  <?php if( validation_errors()) : ?>
  <div class="alert alert-danger" role="alert">
    <?= validation_errors();  ?>
  </div>
<?php endif; ?>
</div>

<?php if( $this->session->flashdata('stok') ) : ?>
<div class="row mt-3">
  <div class="alert alert-danger alert-dismissible fade show" role="alert">Jumlah Produk 
    <strong>Tidak</strong> mencukupi.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
<?php endif; ?>

<?php if( $this->session->flashdata('input') ) : ?>
<div class="row mt-3">
  <div class="alert alert-success alert-dismissible fade show" role="alert">Data Produk 
    <strong>berhasil</strong><?= $this->session->flashdata('input')?>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
<?php endif; ?>

<div class="row mt-3">
  <div class="col-md-10">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#formModal">
      Tambah Data Produk
    </button>

    <form class="float-right" action="" method="post" autocomplete="off">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari.." name="keyword">
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit">cari</button>
        </div>
      </div>
    </form>
    <form class="float-right" action="" method="post">
      <div class="input-group">
        <select class="custom-select" name="carikategori">
          <option value="">Kategori</option>
          <?php foreach($kategori as $k) : ?>
          <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
          <?php endforeach; ?>
        </select>
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit">cari</button>
        </div>
      </div>
    </form>
  
  </div>
</div>
<br>

<?php if (empty($produk)): ?>
<div class="alert alert-danger" role="alert">
Data tidak ditemukan..
</div>
<?php endif; ?>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Merk</th>
      <th scope="col">Stok</th>
      <th scope="col">Satuan</th>
      <th scope="col">Harga</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($produk as $stok) { ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $stok['id_produk']; ?></td>
      <td><?= $stok['nama_produk']; ?></td>
      <td><?= $stok['merk']; ?></td>
      <td><?= $stok['stok']; ?></td>
      <td><?= $stok['nama_satuan']; ?></td>
      <td>Rp. <?= number_format($stok['harga'],2,',','.'); ?></td>
      <td>
        <a href="" class="badge badge-success tampilModalStok" data-toggle="modal" data-target="#formStok" data-id_produk="<?= $stok['id_produk']; ?>">Tambah Stok</a>
        <a href="" class="badge badge-primary tampilModalKirim" data-toggle="modal" data-target="#formKirim" data-id_produk="<?= $stok['id_produk']; ?>">Kirim</a>
      </td>
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>
</div>


<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModal">Tambah Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url() ?>produk/tambah" method="post" autocomplete="off">
          
          <div class="form-group">
            <label for="no_masuk">No Masuk</label>
            <input type="text" class="form-control" name="no_masuk" value="<?= $kodemasuk?>" readonly>
          </div>
          <div class="form-group">
            <label for="id_penjual">ID Penjual</label>
            <input type="text" class="form-control" id="id_penjual" name="id_penjual" placeholder="Masukkan ID Supplier">
          </div>
          <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" class="form-control" name="id_produk" placeholder="Masukkan ID Barang">
          </div>
          <div class="form-group">
            <label for="nama_penjual">Nama Penjual</label>
            <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" placeholder="Masukkan Nama Supplier">
          </div>
          <div class="form-group">
            <label for="alamat_penjual">Alamat Penjual</label>
            <input type="text" class="form-control" id="alamat_penjual" name="alamat_penjual" placeholder="Masukkan Alamat supplier">
          </div>
          <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="form-control" name="id_kategori">
              <?php foreach($kategori as $k) : ?>
              <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama Barang">
          </div>
          <div class="form-group">
            <label for="merk">Merk Produk</label>
            <input type="text" class="form-control" name="merk" placeholder="Masukkan Merk Barang">
          </div>
          <div class="form-group">
            <label for="harga">Harga Produk</label>
            <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Barang">
          </div>
          <div class="form-group">
            <label for="stok">Stok Produk</label>
            <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok Barang">
          </div>
          <div class="form-group">
            <label for="satuan">Satuan</label>
            <select class="form-control" name="satuan">
              <?php foreach($satuan as $s) : ?>
              <option value="<?= $s['id_satuan']; ?>"><?= $s['nama_satuan']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tgl_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk">
          </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="formStok" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModal">Tambah Stok Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url() ?>produk/update" method="post" autocomplete="off">
          
          <div class="form-group">
            <label for="no_masuk">No Masuk</label>
            <input type="text" class="form-control" name="no_masuk" value="<?= $kodemasuk?>" readonly>
          </div>
          <div class="form-group">
            <label for="id_penjual">ID Penjual</label>
            <input type="text" class="form-control" id="id_penjual2" name="id_penjual" placeholder="masukkan ID supplier">
          </div>
          <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" class="form-control" id="id_p" name="id_produk" readonly>
          </div>
          <div class="form-group">
            <label for="nama_penjual">Nama Penjual</label>
            <input type="text" class="form-control" id="nama_penjual2" name="nama_penjual" placeholder="Masukkan Nama Supplier">
          </div>
          <div class="form-group">
            <label for="alamat_penjual">Alamat Penjual</label>
            <input type="text" class="form-control" id="alamat_penjual2" name="alamat_penjual" placeholder="Masukkan Alamat supplier">
          </div>
          <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_p" name="nama_produk" readonly>
          </div>
          <div class="form-group">
            <label for="harga">Harga Produk</label>
            <input type="text" class="form-control" id="harga_p" name="harga">
          </div>
          <div class="form-group">
            <label for="stok">Stok Produk</label>
            <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok Barang">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="tambahstok" name="tambahstok" hidden>
          </div>
          <div class="form-group">
            <label for="tgl_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk">
          </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Stok</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="formKirim" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Kirim Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url() ?>produk/kirim" method="post" autocomplete="off">
          
          <div class="form-group">
            <label for="no_keluar">No Masuk</label>
            <input type="text" class="form-control" id="no_keluar" name="no_keluar" value="<?= $kodekeluar?>" readonly>
          </div>         
          <div class="form-group">
            <label for="id_pembeli">ID Reseller</label>
            <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" placeholder="Masukkan ID Reseller">
          </div>
          <div class="form-group">
            <label for="nama_pembeli">Nama Reseller</label>
            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" placeholder="Masukkan Nama Reseller">
          </div>
          <div class="form-group">
            <label for="alamat_pembeli">Alamat Reseller</label>
            <input type="text" class="form-control" id="alamat_pembeli" name="alamat_pembeli" placeholder="Masukkan Alamat Reseller">
          </div>
          <div class="form-group">
            <label for="id_produk">ID Produk</label>
            <input type="text" class="form-control" id="id_produk" name="id_produk" readonly>
          </div>
          <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" readonly>
          </div>
          <div class="form-group">
            <label for="jumlah_produk">Jumlah Produk</label>
            <input type="text" class="form-control" id="jumlah_produk" name="jumlah_produk" placeholder="Banyaknya Barang">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="stok" name="stok" hidden>
          </div>
          <div class="form-group">
            <label for="harga">Harga Produk</label>
            <input type="text" class="form-control" id="harga" name="harga" readonly>
          </div>
          <div class="form-group">
            <label for="total_harga">Total Harga Produk</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
          </div>
          <div class="form-group">
            <label for="tgl_keluar">Tanggal Kirim</label>
            <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
          </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Kirim Produk</button>
        </form>
      </div>
    </div>
  </div>
</div>