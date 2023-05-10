$(function(){

    $('#id_penjual').on('keyup', function(){
        var id_penjual = $('#id_penjual').val();

        $.ajax({
            url: 'http://localhost/gudang-online/produk/getpenjual',
            method: 'post',
            dataType: 'json',
            data: {'id_penjual': id_penjual},
            success: function(data){
                $('#nama_penjual').val(data.nama_penjual);
                $('#alamat_penjual').val(data.alamat_penjual);
            }

        })

    });

    $('#id_penjual2').on('keyup', function(){
        var id_penjual = $('#id_penjual2').val();

        $.ajax({
            url: 'http://localhost/gudang-online/produk/getpenjual',
            method: 'post',
            dataType: 'json',
            data: {'id_penjual': id_penjual},
            success: function(data){
                $('#nama_penjual2').val(data.nama_penjual);
                $('#alamat_penjual2').val(data.alamat_penjual);
            }

        })

    });
    
    
    $('#id_pembeli').on('keyup', function(){
        var id_pembeli = $('#id_pembeli').val();

        $.ajax({
            url: 'http://localhost/gudang-online/produk/getpembeli',
            method: 'post',
            dataType: 'json',
            data: {'id_pembeli': id_pembeli},
            success: function(data){
                $('#nama_pembeli').val(data.nama_pembeli);
                $('#alamat_pembeli').val(data.alamat_pembeli);
            }

        })

    });

    $('#jumlah_produk').on('keyup', function(){

        total = $('#jumlah_produk').val() * $('#harga').val();
        $('#total_harga').val(total);
    });



    $('.tampilModalStok').on('click', function(){

        const id_produk = $(this).data('id_produk');
        
        $.ajax({
            url: 'http://localhost/gudang-online/produk/stokupdate',
            data: {id_produk : id_produk},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id_p').val(data.id_produk);
                $('#nama_p').val(data.nama_produk);
                $('#harga_p').val(data.harga);
                $('#tambahstok').val(data.stok);
            }

        })
    });


    $('.tampilModalKirim').on('click', function(){

        const id_produk = $(this).data('id_produk');
        
        $.ajax({
            url: 'http://localhost/gudang-online/produk/kirimproduk',
            data: {id_produk : id_produk},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id_produk').val(data.id_produk);
                $('#nama_produk').val(data.nama_produk);
                $('#harga').val(data.harga);
                $('#stok').val(data.stok);
                $('#satuan').val(data.id_satuan);
            }

        })
    });



});