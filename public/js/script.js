$(function() {
  $(".tombolTambahData").on("click", function() {
    $("#formModalTitle").html("Tambah Data Mahasiswa");
    $('.modal-footer button[type=submit]').html('Tambah Data')
  });

  $(".tampilModalUbah").on("click", function() {
    $("#formModalTitle").html("Edit Data Mahasiswa");
    $('.modal-footer button[type=submit]').html('Edit Data');
    $(".modal-body form").attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');


    const id = $(this).data('id');

    $.ajax({
        url: "http://localhost/phpmvc/public/mahasiswa/getubah",
        data: {id : id},
        method: 'post',
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#nim').val(data.nim);
            $('#email').val(data.email);
            $('#jurusan').val(data.jurusan).change();
        }
    });

});
});
