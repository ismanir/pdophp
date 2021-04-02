$(function() { //jquery, kalo d js namanya document.Ready jalankan fungsi berikut

    $('.tombolTambahData').on('click', function() { //jqury tlg carikan kelas ini yang ketika diklik jalankan fungsi berikut

      $('#formModalLabel').html('Tambah Data Mahasiswa');//jquery tolong cari class yang ketika diklik cari id yang html nya diubah menjadi

      $('.modal-footer button[type=submit]').html('Tambah Data');//css selector, cari klas tsb kemudian cari button yg tipenya hanya submit

    });

    $('.tombolTambahData').on('click', function() {
      $('#formModalLabel').html('Tambah Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Tambah Data');
      $('#nama').val('');
      $('#nim').val('');
      $('#email').val('');
      $('#jurusan').val('');
      $('#id').val('');
  });

    $('.tampilModalUbah').on('click', function() {
      
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','http://localhost/4phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
          url: 'http://localhost/4phpmvc/public/mahasiswa/getubah',
          data: {id: id},
          method: 'post',
          dataType: 'json',
          success: function(data) {
            $('#nama').val(data.nama);
            $('#nim').val(data.nim);
            $('#email').val(data.email);
            $('#jurusan').val(data.jurusan);
            $('#id').val(data.id);
          }
        });
    });

});