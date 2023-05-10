<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>">

    <title><?= $judul ; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Gudang Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= base_url(); ?>produk">Stok Produk</a>
                <div class="dropdown">
                    <a class="nav-item nav-link" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Laporan
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url(); ?>laporan">Laporan Produk Masuk</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>laporan/produkKeluar">Laporan Produk Keluar</a>
                    </div>
                </div>


            </div>
        </div>
    </nav>